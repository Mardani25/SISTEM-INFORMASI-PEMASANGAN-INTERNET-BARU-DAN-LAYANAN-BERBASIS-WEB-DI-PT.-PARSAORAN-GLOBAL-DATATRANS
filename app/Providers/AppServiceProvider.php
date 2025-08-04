<?php

namespace App\Providers;

use Midtrans\Config as MidtransConfig;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $this->app->singleton('CheckRole', \App\Http\Middleware\CheckRole::class);
        Paginator::useBootstrap();
        MidtransConfig::$serverKey = config('midtrans.serverKey');
        MidtransConfig::$clientKey = config('midtrans.clientKey');
        MidtransConfig::$isProduction = config('midtrans.isProduction');
        MidtransConfig::$isSanitized = config('midtrans.isSanitized');
        MidtransConfig::$is3ds = config('midtrans.is3ds');
    }
}
