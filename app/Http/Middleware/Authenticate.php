<?php


namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Tymon\JWTAuth\Facades\JWTAuth; // Ensure this line is present
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Closure;

class Authenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard()->check()) {
            return $this->auth->shouldUse();
        }

        $this->unauthenticated($request, $guards);
    }

    protected function unauthenticated($request, array $guards)
    {
        throw new \Illuminate\Auth\AuthenticationException(
            'Unauthenticated.', $guards, $this->redirectTo($request)
        );
    }
    // app/Http/Middleware/Authenticate.php
    public function handle($request, Closure $next, ...$guards)
    {
        if ($token = $request->cookie('token')) {
            try {
                $user = JWTAuth::setToken($token)->authenticate();
                if ($user) {
                    Auth::login($user);
                }
            } catch (Exception $e) {
                Log::error('Token authentication failed', ['error' => $e->getMessage()]);
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

        return $next($request);
    }


    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }
}

