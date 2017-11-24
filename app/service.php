<?php

$kernel->set('route', function () {
    return new \Phroute\Phroute\RouteCollector();
});

$kernel->set('mailer', function () {
    $transport = new Swift_SmtpTransport();

    return new Swift_Mailer($transport);
});

require_once 'adapters.php';
require_once 'repositories.php';