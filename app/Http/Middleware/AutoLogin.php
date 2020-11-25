<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Home\LoginController;
use Closure;

class AutoLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::viaRemember()) {
            if ($request->cookie('access-token') == null) {
                LoginController::createToken(\Auth::user());
            }
        }

        return $next($request);
    }
}
