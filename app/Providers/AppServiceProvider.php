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

        //gate para verificar se o usuario pode inserir dados

        Gate::define('user_can_insert', function (User $user) {

            //nessa gate eu uso a função in array para buscar 
            //se existe a plavra insert dentro dele
            //mas quando o meu usuario faz a reuisição ele não chega
            //como um array e sim como um json 
            // por isso eu tenho que usar o json_decode()
            //assim eu posso passar ele como paratro para a função in_array
            // 1- ela recebe a palavra que eu quero buscar
            // 2- o array onde eu quero buscar

           return in_array('insert',json_decode($user->permissions));



        });

         Gate::define('user_can_delete', function (User $user) {
            return in_array('delete',json_decode($user->permissions));
       });
        
        



    }
}
