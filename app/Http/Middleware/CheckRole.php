<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Check if the user is logged in
        if (! Auth::check()) {
            abort(403, 'Unauthorized access.');
        }

        // 2. Convert both the user's role and the required role to lowercase to compare them
        $userRole = strtolower(Auth::user()->role);
        $requiredRole = strtolower($role);

        // 3. Check if they match
        if ($userRole !== $requiredRole) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}