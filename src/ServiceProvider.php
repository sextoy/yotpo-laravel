<?php namespace Sextoy\YotpoLaravel;

use Yotpo\Yotpo;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('yotpo', function($app) {
            $ak = Config::get('services.yotpo.app_key');
            $st = Config::get('services.yotpo.secret');
            return new Yotpo($ak, $st);
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'sextoy/yotpo-laravel', 'yotpo');
    }

}