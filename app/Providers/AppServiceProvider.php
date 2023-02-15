<?php

namespace App\Providers;

use App\CMS;
use Illuminate\Pagination\Paginator;
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
        //
    }

    public function genral(){

        $genral = CMS::where('section_id','genral')->first();

        return $genral;
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        view()->composer(['layouts.header','layouts.footer','layouts.cta','layouts.app'],
         function ($view) {
            $view->with('genral', $this->genral());
        });
        

    }
}
