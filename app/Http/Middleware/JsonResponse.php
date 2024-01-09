<?php

namespace App\Http\Middleware;

use Closure;

class JsonResponse
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
        
        if (request()->header('CONTENT_TYPE') != null && request()->header('CONTENT_TYPE') == 'application/json') {
            return $next($request);
        }

        return response()->json(['message'=>'this request must be json']);

    }
}
