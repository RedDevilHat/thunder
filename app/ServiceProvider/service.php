<?php

use etc\http\Response\ResponseFactory;
use GeneratedHydrator\Configuration;
use Phroute\Phroute\RouteCollector;


$kernel->set('route', function () {
    return new RouteCollector();
});

$kernel->set('response', function () {
    return ResponseFactory::getResponse();
});