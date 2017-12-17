<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 13:42
 */

namespace etc\http\Response;


use etc\ClassNameHelper;
use etc\data\Hydrator\Hydrator;
use etc\Kernel;

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

        $kernel = Kernel::getContainer();


        $result = [];

        if (is_array($data) && count($data) > 0) {
            foreach ($data as $entity) {
                if (is_object($entity)) {
                    /** @var Hydrator $hydrator */
                    $hydrator = $kernel->make(Hydrator::class,
                        ['entityName' => ClassNameHelper::getEntityClassNameWithoutNameSpace(get_class($entity))]);

                    $result[] = $hydrator->extract($entity);
                } else {
                    $result[] = $entity;
                }
            }
        }

        if (is_object($data)) {
            /** @var Hydrator $hydrator */
            $hydrator = $kernel->make(Hydrator::class,
                ['entityName' => ClassNameHelper::getEntityClassNameWithoutNameSpace(get_class($data))]);

            $result = $hydrator->extract($data);
        }

        return json_encode($result);
    }


    /**
     * @param string $stacktrace
     *
     * @return string
     */
    public static function error($statusCode, string $stacktrace = null) : string
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