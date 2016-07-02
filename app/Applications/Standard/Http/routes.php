<?php

/** @var Dingo\Api\Routing\Router $router */

// Display current user's information
$router->get('profile', 'ProfileController@get');

// Update current user's information
$router->put('profile', 'ProfileController@update');
