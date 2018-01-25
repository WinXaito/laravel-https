<?php

/**
 * @package WinXaito/laravel-https
 * @author Kevin Vuilleumier <mail@winxaito.com>
 * @copyright 2018 Kevin Vuilleumier
 * @license https://www.gnu.org/licenses/gpl.txt GNU GPL3
 * @link https://github.com/WinXaito/laravel-https
 */

namespace WinXaito\LaravelHttpsRedirect;

use Illuminate\Support\ServiceProvider;

class LaravelHttpsServiceProvider extends ServiceProvider{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Location of package config file
     *
     * @var string
     */
    protected $configPath = __DIR__ . '/../config/https-redirection.php';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->mergeConfigFrom($this->configPath, 'https-redirection');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //Publishes
        $this->publishes([$this->configPath => $this->getConfigPath()], 'config');

        //Middleware
        $this->app['Illuminate\Contracts\Http\Kernel']->pushMiddleware('WinXaito\LaravelHttpsRedirect\Http\Middleware\HttpsRedirection');
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath() {
        return config_path('https-redirection.php');
    }

    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    protected function publishConfig($configPath) {
        $this->publishes([$configPath => config_path('debugbar.php')], 'config');
    }
}
