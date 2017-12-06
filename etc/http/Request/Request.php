<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 04.12.2017
 * Time: 9:10
 */

namespace etc\http\Request;

use etc\Kernel;
use etc\security\Exception\UnauthorizedException;


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


    /**
     * @return string
     * @throws UnauthorizedException
     */
    public function getAuthToken()
    {
        $authKey = Kernel::getParameters('auth_header');
        $server = $_SERVER;
        $token = false;
        foreach ($server as $key => $value) {
            if($key === 'HTTP_' . str_replace('-', '_', $authKey)) {
                $token = $value;
            }
        }

        if($token) {
            return $token;
        }

        throw new UnauthorizedException();

    }
}