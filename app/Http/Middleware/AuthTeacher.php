<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthTeacher
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('AuthTeacher middleware called', [
            'session_teacher_id' => session('teacher_id'),
            'session_data' => session()->all()
        ]);

        if (!session('teacher_id')) {
            Log::warning('Teacher not authenticated, redirecting to login');
            return redirect()->route('login')->with('error', 'Please login to access this page');
        }

        return $next($request);
    }
}
