<?php

namespace App\Http\Middleware;

use Closure;
use App\AccessHandler as Access;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();

        if (! Access::check($user->role, $role)) {
            abort(404);
        }

        return $next($request);
    }
}
