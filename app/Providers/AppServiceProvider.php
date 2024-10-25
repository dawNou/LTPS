<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // bootstrap
        Paginator::useBootstrap();

        //mendefinisikan sebuah gate, yang namanya admin, dimana hanya bisa diakses oleh username

        // admin
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        // pemilik
        Gate::define('pemilik', function (User $user) {
            return $user->is_pemilik;
        });
    }
}
