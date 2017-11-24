<?php
$kernel = \etc\Kernel::getContainer();

$kernel->set('mysql', function () {
    $db = new \etc\data\MySQL\MySQLConnection(
        \etc\Kernel::getParameters('dsn'),
        \etc\Kernel::getParameters('username'),
        \etc\Kernel::getParameters('password')
    );

    return $db;
});

$kernel->set('mysql-adapter', function () use ($kernel) {
    return (new \etc\data\Repositories\Adapter\MySQLAdapter(
        $kernel->get('mysql')
    ))->getAdapter();
});