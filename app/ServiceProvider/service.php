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

$kernel->set('hydrator', function () {
    $config        = new Configuration('Example');
    $hydratorClass = $config->createFactory()->getHydratorClass();
    $hydrator      = new $hydratorClass();
});

require_once 'repositories.php';
require_once 'adapters.php';