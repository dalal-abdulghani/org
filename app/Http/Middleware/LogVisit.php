<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;

class LogVisit
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
        Visit::create([
            'page' => $request->path(),
            'visited_at' => now()
        ]);

        return $next($request);
    }
}

