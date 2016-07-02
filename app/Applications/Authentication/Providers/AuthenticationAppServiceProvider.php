<?php

namespace App\Applications\Authentication\Providers;

use App\Core\Providers\AbstractApplicationServiceProvider;
use Dingo\Api\Routing\Router;

class AuthenticationAppServiceProvider extends AbstractApplicationServiceProvider
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
            'namespace' => 'App\Applications\Authentication\Http\Controllers',
            'version' => 'v1',
            'prefix' => 'auth',
        ];

        $router->group($attributes, function ($router) {
            require $this->getApplicationDir('Http/routes.php');
        });
    }
}
