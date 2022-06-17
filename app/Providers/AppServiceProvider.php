<?php

namespace App\Providers;

use Config;
use App\Models\Setting;
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $settings = Setting::select('sales_tax','extra_charge','stripe_fee')->first();
        if($settings){
            Config::set('constants.rates',$settings->toArray());
        }

        view()->composer('*', function($view) {
            $view->with('storage', Config::get('constants.STORAGE'));
        });
    }
}
