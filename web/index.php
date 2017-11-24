<?php
require_once '../vendor/autoload.php';

\etc\Kernel::init();
$kernel    = \etc\Kernel::getContainer();
$parametrs = \etc\Kernel::getParameters();

require_once '../app/service.php';
require_once '../app/router.php';


try {
    $routData   = $router->getData();
    $dispatcher = new Phroute\Phroute\Dispatcher($routData);
    $response   = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Print out the value returned from the dispatched function
    echo \etc\http\Response\JsonResponse::success($response);
} catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $exception) {
    echo \etc\http\Response\JsonResponse::notFound();
} catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $exception) {
    echo \etc\http\Response\JsonResponse::methodNotAllowed();
} catch (Exception $exception) {
    echo \etc\http\Response\JsonResponse::error($exception->getMessage());
}
