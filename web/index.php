<?php
require_once '../vendor/autoload.php';

\etc\Kernel::init();
/** @var \DI\Container $kernel */
$kernel     = \etc\Kernel::getContainer();
$parameters = \etc\Kernel::getParameters();
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('etc\error\ErrorHandler::handler');
set_exception_handler('etc\error\ExceptionHandler::handler');

require_once '../app/ServiceProvider/service_provider_bootstrap.php';
require_once '../app/Router/router.php';

/** @var \etc\http\Response\ResponseInterface $responseInterface */
$responseInterface = $kernel->get('response');
$routData          = $router->getData();
$dispatcher        = new Phroute\Phroute\Dispatcher($routData);
$response          = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Print out the value returned from the dispatched function
echo $responseInterface::success($response);

