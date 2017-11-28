<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 17:23
 */

namespace etc\http\Response;

/**
 * Interface ResponseInterface
 *
 * @package etc\http\Response
 */
interface ResponseInterface
{
    /**
     * @param $data
     *
     * @return string
     */
    public static function success($data) : string;

    /**
     * @param string $stacktrace
     *
     * @return string
     */
    public static function error(int $statusCode, string $stacktrace) : string;
}