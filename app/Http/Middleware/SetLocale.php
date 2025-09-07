<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Daftar locale yang diizinkan
     */
    private const SUPPORTED_LOCALES = ['en', 'id'];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Ambil locale dari session atau default dari config
        $locale = Session::get('locale', config('app.locale', 'en'));

        // Pastikan locale valid, kalau tidak pakai default
        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = config('app.locale', 'en');
        }

        // Set locale aplikasi
        App::setLocale($locale);

        // Lanjutkan request
        return $next($request);
    }
}
