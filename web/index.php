<?php
require_once '../vendor/autoload.php';

\etc\Kernel::init();
/** @var \DI\Container $kernel */
$kernel    = \etc\Kernel::getContainer();
$parameters = \etc\Kernel::getParameters();

require_once '../app/service.php';
require_once '../app/router.php';


try {
    /** @var \etc\http\Response\ResponseInterface $responseInterface */
    $responseInterface = $kernel->get('response');
    $routData          = $router->getData();
    $dispatcher        = new Phroute\Phroute\Dispatcher($routData);
    $response          = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo $responseInterface::success($response);
} catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $exception) {
    echo $responseInterface::notFound();
} catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $exception) {
    echo $responseInterface::methodNotAllowed();
} catch (Exception $exception) {
    echo $responseInterface::error($exception->getMessage());
}
