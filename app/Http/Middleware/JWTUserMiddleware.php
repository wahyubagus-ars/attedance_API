<?php

namespace App\Http\Middleware;

use App\Constants\Constant;
use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class JWTUserMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            if(!Auth::guard('user')){
                return response()->json(['status' => 'Authorization Token not found']);
            }
            if(auth()->guard('user')->user()->role_id != Constant::ROLE_USER){
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
