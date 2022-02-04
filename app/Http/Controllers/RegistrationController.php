<?php

namespace App\Http\Controllers;

use App\Authentication;
use App\Constants\Constant;
use App\User;
use App\Utils\ResponseApi;
use Illuminate\Http\Request;

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

        $request['password'] = bcrypt($request['password']);
        $model = Authentication::create($request->all() + ['role_id' => $role_id]);

        return ResponseApi::successResponse($model, Constant::SUCCESS, null, 201, null);
    }
}
