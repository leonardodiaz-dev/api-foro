<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsModeradorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           $user = auth('api')->user();
        if ($user && $user->role === 'moderador') {
            return $next($request);
        } else {
            return response()->json(['message' => 'You are not moderador'], 403);
        }
    }
}
