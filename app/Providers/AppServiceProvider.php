<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL; // <-- PASTIKAN BARIS INI ADA
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
{
    // Paksa semua link asset, login, dan register pakai HTTPS kalau di server Railway
    if (config('app.env') === 'production' || env('RAILWAY_ENVIRONMENT')) {
        URL::forceScheme('https');
    }
}
}