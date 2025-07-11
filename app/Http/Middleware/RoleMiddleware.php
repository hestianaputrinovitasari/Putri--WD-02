<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        // Cek apakah user tidak login atau rolenya tidak cocok
        if (!$user || !in_array($user->role, $roles)) {
            return response('Unauthorized', 403);
        }

        return $next($request);
    }
}
