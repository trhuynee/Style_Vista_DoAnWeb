<?php

namespace App\Providers;
use App\Models\hoadonban;
use Illuminate\Support\ServiceProvider;

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
        $hoadonban1 = hoadonban::latest('updated_at')->take(5)->get();
        view()->share(compact('hoadonban1'));
    }
}
