<?php
/** @var \Phroute\Phroute\RouteCollector $router */
$router = $kernel->get('route');

$router->controller('/', \Src\http\Controller\HomeController::class);


