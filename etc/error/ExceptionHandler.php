<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 22:09
 */

namespace etc\error;


use etc\http\Response\ResponseFactory;

class ExceptionHandler
{
    /**
     * @param $exception
     */
    public static function handler($exception)
    {
        // Code is 404 (not found) or 500 (general error)
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        $response = ResponseFactory::getResponse();

        echo $response->error($code,"Fatal error "  .
             "Uncaught exception: '" . get_class($exception) . "' " .
             "Message: '" . $exception->getMessage() . "' "  .
             "Stack trace:" . $exception->getTraceAsString() . " " .
             "Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine());
    }
}