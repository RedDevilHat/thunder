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
     * @return string
     */
    public static function notFound() : string;

    /**
     * @return string
     */
    public static function methodNotAllowed() : string;

    /**
     * @param string $message
     *
     * @return string
     */
    public static function error(string $message) : string;
}