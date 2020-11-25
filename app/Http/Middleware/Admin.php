<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;


class Admin
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

        $response = $next($request);
        if(Auth::check() and Auth::user()->isAdmin()) {
            return $response;
        } else {
            return view('home.message.er-token')
                ->with('message', 'Bạn không có quyền truy cập liên kết trên');
        }
    }
}
