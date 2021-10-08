<?php

namespace App\Http\Middleware;

use App\Exceptions\Handler;
use Closure;
use Illuminate\Http\Request;

class AcceptMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');
        
        return $next($request);
    }
}
