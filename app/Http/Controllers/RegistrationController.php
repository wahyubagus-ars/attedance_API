<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Authentication;
use App\Constants\Constant;
use App\User;
use App\Utils\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegistrationController extends Controller
{
    public function registrationAgency(Request $request){
        return $this->registration($request, 2);
    }

    public function registrationUser(Request $request){
        return $this->registration($request, 1);
    }

    private function registration($request, int $role_id){
        if(null != Authentication::searchAuthByEmail($request->email)->first()){
            return ResponseApi::failedResponse(null, Constant::EMAIL_ALREADY_REGISTERED, null, 400);
        }

        $actual_password = $request['password'];
        $request['password'] = bcrypt($request['password']);
        $model = Authentication::create($request->all() + ['role_id' => $role_id]);

        switch ($role_id) {
            case 1:
                if(! $token = Auth::guard('agency')->attempt(['email' => $request->email, 'password' => $actual_password])){
                    return ResponseApi::failedResponse(null, Constant::UNAUTHORIZATION, null, 401);
                }
                break;
            case 2:
                if(! $token = Auth::guard('user')->attempt(['email' => $request->email, 'password' => $actual_password])){
                    return ResponseApi::failedResponse(null, Constant::UNAUTHORIZATION, null, 401);
                }
            default:
                break;
        }
        $response_headers = [
            'Access-Token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ];

        return ResponseApi::successResponse($model, Constant::SUCCESS, null, 201, $response_headers);
    }

    public function agencyProfile(Request $request){
        $auth_id = auth()->guard('agency')->user()->id;
        $data_agency = Agency::create($request->all() + ['auth_id' => $auth_id]);
        Authentication::where('id', $auth_id)->update([
            'agency_id' => $data_agency->id,
            'status' => true,
            'active' => true
        ]);

        return ResponseApi::successResponse($data_agency, Constant::SUCCESS, null, 201, null);
    }

    public function userProfile(Request $request){
        $auth_id = auth()->guard('user')->user()->id;
        $data_user = User::create($request->all() + ['auth_id' => $auth_id]);
        Authentication::where('id', $auth_id)->update([
            'user_id' => $data_user->id,
            'status' => true,
            'active' => true
        ]);

        return ResponseApi::successResponse($data_user, Constant::SUCCESS, null, 201, null);
    }
}
