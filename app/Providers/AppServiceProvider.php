<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User; 

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
        //Gates

        //testando se o role do usuario é admin

        Gate::define('user_is_admin', function (User $user) {

            return $user->role === 'admin';

        });

         Gate::define('user_is_user', function (User $user) {

            return $user->role === 'user';

        });


    }
}
