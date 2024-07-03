<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            $token = $request->cookie('jwt_token') ?? session('jwt_token');
            if (!$token) {
                return redirect()->route('login')->with('error', 'Token not found');
            }

            $user = JWTAuth::setToken($token)->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return redirect()->route('login')->with('error', 'Token is Invalid');
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return redirect()->route('login')->with('error', 'Token is Expired');
            } else {
                return redirect()->route('login')->with('error', 'Authorization Token not found');
            }
        }
        return $next($request);
    }
}
