<?php

namespace App\Http\Middleware;

use Closure;

class AbortIfNotInTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $team = null)
    {
        abort_if(
            !$request->user()->teams->contains($team),
            403,
            "You are not allowed to access this resource."
        );
        
        return $next($request);
    }
}
