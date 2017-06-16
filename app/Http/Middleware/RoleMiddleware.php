<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            return redirect()->route('web.login');
        }

        if (! $request->user()->hasRole($role)) {
            return redirect()->route('dashboard.main')->with('error','Access Denied.');
        }

        return $next($request);
    }
}
