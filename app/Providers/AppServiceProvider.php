<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Proyect;
use App\Observers\ProyectObserver;

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
        Proyect::observe(ProyectObserver::class);
    }
}
