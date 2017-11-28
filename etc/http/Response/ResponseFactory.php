<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 17:25
 */

namespace etc\http\Response;


use etc\Kernel;

class ResponseFactory
{
    /**
     * @return ResponseInterface
     */
    public static function getResponse() : ResponseInterface
    {
        switch (Kernel::getParameters('response_format')) {
            case 'json':
                return new JsonResponse();
                break;
            default:
                return new JsonResponse();
        }
    }
}