<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponses;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    use ApiResponses;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authenticatedUser = $request->user();

        if (! ($authenticatedUser && $authenticatedUser->isAdmin())) {
            return $this->unauthorized('You are not authorized to access this resource.');
        }

        return $next($request);
    }
}
