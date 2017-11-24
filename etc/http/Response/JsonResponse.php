<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:42
 */

namespace etc\http\Response;


class JsonResponse
{
    /**
     * @param $data
     *
     * @return string
     */
    public static function success($data) : string
    {
        return json_encode($data);
    }

    /**
     * @return string
     */
    public static function notFound() : string
    {
        http_response_code(StatusHelper::HTTP_NOT_FOUND);

        return json_encode(StatusHelper::getMessageForCode(StatusHelper::HTTP_NOT_FOUND));
    }

    /**
     * @return string
     */
    public static function methodNotAllowed() : string
    {
        http_response_code(StatusHelper::HTTP_METHOD_NOT_ALLOWED);

        return json_encode(StatusHelper::getMessageForCode(StatusHelper::HTTP_METHOD_NOT_ALLOWED));

    }

    /**
     * @param string $message
     *
     * @return string
     */
    public static function error(string $message) : string
    {
        http_response_code(StatusHelper::HTTP_INTERNAL_SERVER_ERROR);

        return json_encode($message);
    }
}