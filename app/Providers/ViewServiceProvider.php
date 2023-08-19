<?php

namespace App\Providers;

use App\View\Composers\AvararComposer;
use App\View\Composers\MenuComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot()
    {


        // Using closure based Composers...
/*        Facades\View::composer('include.nav', function (View $view) {

            $view->with('www', 2);

        });*/
                Facades\View::composer('include.nav', MenuComposer::class); // меню категории
                Facades\View::composer('include.nav', AvararComposer::class); // меню категории



    }
}
