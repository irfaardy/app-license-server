<?php

namespace Irfa\AppLicenseServer;

use Illuminate\Support\ServiceProvider;

class AppLicenseServerServiceProvider extends ServiceProvider
{
    protected $namespace='AppLicenseServer\Controllers';
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Route::middleware('api')->post(config('irfa.app_license_server.license_route'),'Irfa\AppLicenseServer\Controller\AppLicenseController@check')->name(config('irfa.app_license_server.route_name'));
        $this->publishes([
            __DIR__.'/../config/irfa/' => config_path('irfa')],'app-license-server');
        $this->publishes([
            __DIR__.'/../migrations/' => database_path('migrations'),
        ], 'app-license');

        
    }
}
