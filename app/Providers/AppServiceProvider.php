<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Gate::define('admin', function(User $user) {
            return $user->role_id === 1;
        }) ;
        Gate::define('ceo', function(User $user) {
            return $user->role === 2;
        }) ;
        Gate::define('manager', function(User $user) {
            return $user->role === 3;
        }) ;
        Gate::define('hrd', function(User $user) {
            return $user->role === 4;
        }) ;
        Gate::define('adv', function(User $user) {
            return $user->role === 5;
        }) ;
        Gate::define('cs', function(User $user) {
            return $user->role === 6;
        }) ;
        Gate::define('dgm', function(User $user) {
            return $user->role === 7;
        }) ;
        Gate::define('cwm', function(User $user) {
            return $user->role === 8;
        }) ;
        //
    }
}
