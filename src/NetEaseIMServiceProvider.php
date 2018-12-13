<?php
/**
 * Created by PhpStorm.
 * User: ds
 * Date: 2018-12-08
 * Time: 16:09
 */

namespace shankesgk2\NetEaseIM;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class NetEaseIMServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app instanceof Application && $this->app->runningInConsole()) {
            $this->publishes([realpath(__DIR__ . '/../config/neteaseim.php') => config_path('neteaseim.php')]);
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(realpath(__DIR__ . '/../config/neteaseim.php'), 'neteaseim');
        $this->app->singleton('neteaseim', function () {
            return new NetEaseIM(config('neteaseim.appKey'), config('neteaseim.appSecret'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['neteaseim'];
    }
}