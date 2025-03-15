<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cache;

class CountVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd('Middleware is triggered');
        // Store visit count in cache or database
        //dd($request);
        if ($request->is('/')) {
            Cache::increment('site_visits');
        }


        //dd(Cache::get('site_visits'));

        return $next($request);
    }
}
