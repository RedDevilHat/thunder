<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 17.12.2017
 * Time: 17:40
 */

namespace etc\http\Exception;


class BadRequestException extends \Exception
{
    protected $code = 500;
}