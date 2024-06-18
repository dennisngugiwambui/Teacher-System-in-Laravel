<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class ShareUniqueId
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            view()->share('unique_id', Auth::user()->unique_id);
        }
        return $next($request);
    }
}
