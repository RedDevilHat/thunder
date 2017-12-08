#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 08.12.2017
 * Time: 13:32
 */

require_once __DIR__.'/../vendor/autoload.php';
$kernel = \etc\Kernel::getContainer();
require_once __DIR__.'/../app/ServiceProvider/service_provider_bootstrap.php';

// if you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#configuration-and-setup for more information
//umask(0000);
set_time_limit(0);

$kernel->get('console');