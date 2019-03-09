<?php namespace Arthuryinzhen\UEditor;


use Arthuryinzhen\AliSMS\AliSMSController;
use Arthuryinzhen\AliSMS\AliSMSServices;
use Illuminate\Support\ServiceProvider;
class AliSMSServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/AliSMS.php' => config_path('AliSMS.php')]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $configPath = realpath(__DIR__ . '/../config/AliSMS.php');
        $this->publishes([$configPath => config_path('AliSMS.php')], 'config');

        $this->app->singleton('alisms', function () {
            return new AliSMSServices();
        });

    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {

    }

}
