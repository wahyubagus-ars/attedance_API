<?php

namespace App\Http\Controllers;

use App\Constants\Constant;
use App\Utils\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    public function loginAgency(Request $request){
        if(! $token = Auth::guard('agency')->attempt($request->only('email', 'password'))){
            return ResponseApi::failedResponse(null, Constant::UNAUTHORIZATION, null, 401);
        }

        $response_headers = [
            'Acces-Token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ];
        return ResponseApi::successResponse(null, Constant::SUCCESS, null, 200, $response_headers);
    }
}
