<?php
namespace AirtelMoney;

use Illuminate\Support\ServiceProvider;

class AirtelMoneyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/airtel.php' => config_path('airtel.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/airtel.php',
            'airtel'
        );
    }
}

