<?php

namespace App\Providers;

use App\Models\Petugas;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('isAdmin', function(Petugas $user){
            return $user->level === 'admin';
        });
        
    }
}
