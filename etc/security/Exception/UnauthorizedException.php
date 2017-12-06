<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 06.12.2017
 * Time: 20:59
 */

namespace etc\security\Exception;


use etc\http\Response\StatusHelper;

class UnauthorizedException extends \Exception
{
    protected $code = StatusHelper::HTTP_UNAUTHORIZED;
}