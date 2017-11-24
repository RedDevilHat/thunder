<?php
$kernel = \etc\Kernel::getContainer();

/** @var \Phroute\Phroute\RouteCollector $router */
$router = $kernel->get('route');

$router->get('/', function () {
    return 'Hello world';
});

$router->controller('/home', \Src\http\Controller\HomeController::class);


