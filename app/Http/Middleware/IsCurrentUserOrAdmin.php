<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsCurrentUserOrAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userFromParam = $request->user;

        $currentUser = $request->user('api')?->id;

        $isAdminUser = $request->user('admin');

        // authorize when is current user on request or admin
        if($userFromParam != $currentUser && !$isAdminUser)
            return response()->json('unathorized', 401);

        return $next($request);
    }
}
