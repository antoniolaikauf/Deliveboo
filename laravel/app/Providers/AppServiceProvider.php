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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                // qua vedere se  bidogna mettere le singole 
                [
                    'environment' => 'sandbox',
                    #cambiato chiavi
                    'merchantId' => 'ycjkhb7b4w9rpmm9',
                    'publicKey' => 'nvyb89smtjb8nq6j',
                    'privateKey' => '82e6f0fc4b799166bba8b9e768d02a20'
                ]
            );
        });
    }
}
