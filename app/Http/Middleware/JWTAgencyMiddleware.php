<?php

namespace App\Http\Middleware;

use App\Constants\Constant;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class JWTAgencyMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            if(!Auth::guard('agency')){
                return response()->json(['status' => 'Authorization Token not found']);
            }
            if(auth()->guard('agency')->user()->role_id != Constant::ROLE_AGENCY){
                return response()->json(['status' => 'Forbidden Access'], 403);
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
