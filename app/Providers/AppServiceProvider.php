<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Фикс ошибки с длиной ключа для MariaDB
        Schema::defaultStringLength(191);

        // Проверка на наличие прав администратора у пользователя
        Gate::define('administrator_rights', function($user){
            return $user->isAdmin();
        });
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
