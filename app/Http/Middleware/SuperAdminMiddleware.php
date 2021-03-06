<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        $user=Auth::user();
        if($user->isSuperAdmin()){
            // Allow to get into the controller method
            return $next($request);
        }
        // Redirect to access not allowed, or page not found 404
        return $next($request);
    }
}
