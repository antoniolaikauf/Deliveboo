<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Gateway;

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
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => '7txby8fhqzdjpvtw',
                    'publicKey' => 'n55dv4wrshd4mwgz',
                    'privateKey' => '003e0df425571ff3393dad1ff69a029e'
                ]
            );
        });
    }
}