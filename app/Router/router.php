<?php
/** @var \src\http\Middleware\AuthGate $gate */

use Src\http\Controller\HomeController;

$gate = $kernel->get('auth_gate');

$router->filter('api_auth', function () use ($gate) {
    $gate->checkGuard();
});


$router->group(['before' => 'api_auth'], function () use ($router) {
    $router->controller('/', HomeController::class);
});



