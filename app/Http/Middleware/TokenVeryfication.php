<?php

namespace App\Http\Middleware;

use Closure;
use Lcobucci\JWT\Token;
use PHPUnit\Exception;

class TokenVeryfication
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
        try {
            decrypt($request->token);
        } catch (Exception $e) {
            return redirect()->route('message.token');
        }
        return $next($request);
    }
}
