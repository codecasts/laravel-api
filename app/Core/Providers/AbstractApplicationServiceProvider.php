<?php

namespace App\Core\Providers;

use App\Support\Files\PathDiscovery;
use Dingo\Api\Routing\Router;
use Illuminate\Support\ServiceProvider;

abstract class AbstractApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerRoutes($this->app['Dingo\Api\Routing\Router']);
    }

        /**
         * The application directory.
         *
         * @param string $path path to mount from the base application path
         *
         * @return string
         */
        protected function getApplicationDir($path = null)
        {
            $applicationPath = realpath(PathDiscovery::definingDirectory($this).'/../');

            if ($path) {
                return $applicationPath.'/'.trim($path, '/');
            }

            return $applicationPath;
        }

        /**
         * Register application routes.
         *
         * @param Router $router
         */
        abstract protected function registerRoutes(Router $router);
}
