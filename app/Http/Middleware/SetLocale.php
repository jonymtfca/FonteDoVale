<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Check if a locale is stored in the session
        $locale = Session::get('locale', config('app.locale'));

        // Set the application's locale
        App::setLocale($locale);

        return $next($request);
    }
}
