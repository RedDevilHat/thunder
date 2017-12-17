<?php

use etc\http\Request\Request;
use etc\http\Response\ResponseFactory;
use Phroute\Phroute\RouteCollector;

$kernel->set('route', function () {
    return new RouteCollector();
});

$kernel->set('response', function () {
    return ResponseFactory::getResponse();
});

$kernel->set('request', function () {
    return new Request();
});

$kernel->set('fs', function () {
    return new Symfony\Component\Filesystem\Filesystem();
});

