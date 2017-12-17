<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 17.12.2017
 * Time: 17:40
 */

namespace Src\Manager\Exception;


class UserManagerException extends \Exception
{
    protected $code = 500;

    protected $message = 'Cant create user';
}