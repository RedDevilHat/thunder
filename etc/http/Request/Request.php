<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 04.12.2017
 * Time: 9:10
 */

namespace etc\http\Request;

use etc\Kernel;


/**
 * Class Request
 *
 * @package etc\http\Request
 */
class Request
{
    /**
     * @param string|null $key
     *
     * @return mixed
     */
    public function get(string $key = null) : mixed
    {
        $getData = $_GET;

        if ($key) {
            return $getData[$key];
        }

        return $getData;
    }

    /**
     * @param string|null $key
     *
     * @return mixed
     */
    public function post(string $key = null) : mixed
    {
        $postData = $_POST;

        if ($key) {
            return $postData[$key];
        }

        return $postData;
    }


    /**
     * @param string|null $key
     *
     * @return mixed
     */
    public function files(string $key = null) : mixed
    {
        $fileData = $_FILES;

        if ($key) {
            return $fileData[$key];
        }

        return $fileData;
    }

    public function getHeaders(string $key = null)
    {
        $headers = apache_request_headers();

        if ($key) {
            return $headers[$key];
        }

        return $headers;

    }

    public function getAuthHeaders()
    {
        $authKey = Kernel::getParameters('auth_header');

        return $this->getHeaders($authKey);
    }
}