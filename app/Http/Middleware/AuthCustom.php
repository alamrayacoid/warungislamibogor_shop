<?php

namespace App\Http\Middleware;

use Closure;

class AuthCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return redirect()->route('login-frontpage');
        }

        return $next($request);
    }
}
