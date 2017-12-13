<?php
/** @var \src\http\Middleware\AuthGate $gate */

use Src\http\Controller\HomeController;

$gate = $kernel->get('auth_gate');

$router->filter('api_auth', function () use ($gate) {
    $gate->checkGuard();
});


$router->group(['prefix' => '/api/v1/'], function () use ($router) {
    $router->controller('/', HomeController::class);

    $router->group(['before' => 'api_auth'], function () use ($router) {
        $router->get('secure', function () {
            return 'this is secure method';
        });
    });
});