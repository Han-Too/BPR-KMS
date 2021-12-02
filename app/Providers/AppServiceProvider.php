<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


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
        //Using Bootstrap
        Paginator::useBootstrap();

        Gate::define('staf-sdm', function(User $user) {
            return $user->role === "Staf SDM";
        });

        Gate::define('kabag-sdm', function(User $user) {
            return $user->role === "Kabag SDM";
        });

        Gate::define('is-karyawan', function(User $user) {
            return $user->role === "Karyawan";
        });

        Gate::define('admin', function(User $user) {
            return $user->role === "Administrator";
        });

    }
}
