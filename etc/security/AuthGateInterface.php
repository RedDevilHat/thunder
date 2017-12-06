<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 06.12.2017
 * Time: 12:28
 */

namespace etc\security;


interface AuthGateInterface
{
    /**
     * @return bool
     */
    public function checkGuard();
}