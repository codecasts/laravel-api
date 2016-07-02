<?php

namespace App\Applications\Standard\Providers;

use App\Core\Providers\AbstractApplicationServiceProvider;
use Dingo\Api\Routing\Router;

class StandardAppServiceProvider extends AbstractApplicationServiceProvider
{
    public function register()
    {
        parent::register();
    }

    /**
     * Register application routes.
     *
     * @param Router $router
     */
    public function registerRoutes(Router $router)
    {
        $attributes = [
            'namespace' => 'App\Applications\Standard\Http\Controllers',
            'version' => 'v1',
            'middleware' => ['api.auth'],
        ];

        $router->group($attributes, function ($router) {
            require $this->getApplicationDir('Http/routes.php');
        });
    }
}
