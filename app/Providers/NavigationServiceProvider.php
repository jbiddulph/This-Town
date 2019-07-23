<?php

namespace App\Providers;

use App\Venue;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        view()->composer('*', function ($view){
//            $towns = Venue::distinct()->orderBy('town', 'ASC')->get('town');
//            return $view->with('venuelist', $towns);
//        });
        view()->composer('*', function ($view){
            $towns = Venue::distinct()->orderBy('town', 'ASC')->pluck('town');
            return $view->with('venuelist', $towns);
        });
    }
}
