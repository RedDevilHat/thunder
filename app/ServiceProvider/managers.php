<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 16.12.2017
 * Time: 15:54
 */

use Src\Manager\TokenManager;
use Src\Manager\UserManager;

$kernel->set('user_manager', function () {
    return new UserManager();
});


$kernel->set('token_manager', function () {
    return new TokenManager();
});