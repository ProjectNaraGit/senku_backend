<?php

namespace App\Providers;

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
        \Illuminate\Support\Facades\View::composer(
            [
                'admin.dashboard',
                'admin.order',
                'admin.order-detail',
                'admin.update-order',
                'admin.layanan',
                'admin.tambah-layanan',
                'admin.edit-layanan'
            ],
            \App\Http\View\Composers\AdminMenuComposer::class
        );
    }
}
