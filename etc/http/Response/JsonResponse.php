<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:42
 */

namespace etc\http\Response;


class JsonResponse implements ResponseInterface
{
    /**
     * @param $data
     *
     * @return string
     */
    public static function success($data) : string
    {
        header('Content-Type: application/json');

        return json_encode($data);
    }


    /**
     * @param string $stacktrace
     *
     * @return string
     */
    public static function error(int $statusCode, string $stacktrace = null) : string
    {
        header('Content-Type: application/json');
        if (StatusHelper::isError($statusCode)) {
            http_response_code($statusCode);
        } else {
            http_response_code(StatusHelper::HTTP_INTERNAL_SERVER_ERROR);
        }

        return json_encode([
            'error' => [
                'status_code' => $statusCode,
                'message'     => StatusHelper::getMessageForCode($statusCode),
                'stacktrace'  => $stacktrace,
            ],
        ]);

    }
}