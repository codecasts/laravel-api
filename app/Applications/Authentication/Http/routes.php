<?php

/** @var Dingo\Api\Routing\Router $router */
$router->post('login', ['as' => 'auth.login', 'uses' => 'AuthenticateController@withCredentials']);

$router->post('register', ['as' => 'auth.register', 'uses' => 'RegisterController@register']);
