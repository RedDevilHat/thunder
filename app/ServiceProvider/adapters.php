<?php
$kernel->set('mysql', function () {
        $mysql = \etc\Kernel::getParameters('mysql');

        return new \etc\data\MySQL\MySQLConnection(
            $mysql['database'],
            $mysql['host'],
            $mysql['username'],
            $mysql['password'],
            $mysql['charset'],
            $mysql['collation'],
            $mysql['lazy']
        );
});

$kernel->set('mysql-adapter', function () use ($kernel) {
    return new \etc\data\Repositories\Adapter\MySQLAdapter(
        $kernel->get('mysql')
    );
});