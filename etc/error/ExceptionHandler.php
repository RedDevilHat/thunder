<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 22:09
 */

namespace etc\error;


use etc\http\Response\ResponseFactory;
use etc\http\Response\ResponseInterface;
use etc\http\Response\StatusHelper;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;

class ExceptionHandler
{
    /**
     * @param $exception
     */
    public static function handler($exception)
    {
        /** @var ResponseInterface $response */
        $response = ResponseFactory::getResponse();

        if ($exception instanceof HttpRouteNotFoundException) {
            $code = StatusHelper::HTTP_NOT_FOUND;
            echo $response->error($code);

            return 0;
        } elseif ($exception instanceof HttpMethodNotAllowedException) {
            $code = StatusHelper::HTTP_METHOD_NOT_ALLOWED;
            echo $response->error($code);

            return 0;
        } else {
            $code = $exception->getCode() !== 0 ? $exception->getCode() : StatusHelper::HTTP_INTERNAL_SERVER_ERROR;
        }


        echo $response->error($code, "Fatal error ".
                                     "Uncaught exception: '".get_class($exception)."' ".
                                     "Message: '".$exception->getMessage()."' ".
                                     "Stack trace:".$exception->getTraceAsString()." ".
                                     "Thrown in '".$exception->getFile()."' on line ".$exception->getLine());

        return 0;
    }
}