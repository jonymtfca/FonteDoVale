<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language.
     */
    public function switchLanguage($locale)
    {
        // Check if the locale is valid
        if (in_array($locale, ['en', 'pt'])) {
            // Set the app locale
            App::setLocale($locale);
            // Store the locale in the session
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}
