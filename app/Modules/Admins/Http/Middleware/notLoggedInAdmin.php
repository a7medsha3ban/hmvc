<?php

namespace Admins\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use function redirect;

class notLoggedInAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next = null,$guard = null)
    {
        if (!Auth::guard($guard)->check() ) {
            return $next($request);
        }else{
            return redirect()->route('Admins.frontend.dashboard');
        }
    }
}
