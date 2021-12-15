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
            return $user->role === 'admin';
        }) ;
        Gate::define('adv', function(User $user) {
            return $user->role === 'adv';
        }) ;
        Gate::define('cs', function(User $user) {
            return $user->role === 'cs';
        }) ;
        Gate::define('dgm', function(User $user) {
            return $user->role === 'dgm';
        }) ;
        Gate::define('cwm', function(User $user) {
            return $user->role === 'cwm';
        }) ;
        Gate::define('ceo', function(User $user) {
            return $user->role === 'ceo';
        }) ;
        Gate::define('manager', function(User $user) {
            return $user->role === 'manager';
        }) ;
        Gate::define('hrd', function(User $user) {
            return $user->role === 'hrd';
        }) ;
        //
    }
}
