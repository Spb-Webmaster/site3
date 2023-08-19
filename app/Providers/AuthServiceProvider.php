<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        foreach (config('moonshine-database.auth.permissions') as $key => $value) {
            Gate::define($value, function ($user) use ($value) {
                // Here you can implement your own authorization logic

                // I use spatie/laravel-permission package, so I can do like this:
                return $user->role->hasPermissionTo($value);
            });
        }
    }
}
