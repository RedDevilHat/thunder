<?php
$kernel->set('mysql', function () {
        return new \etc\data\MySQL\MySQLConnection(
            \etc\Kernel::getParameters('database'),
            \etc\Kernel::getParameters('host'),
            \etc\Kernel::getParameters('username'),
            \etc\Kernel::getParameters('password'),
            \etc\Kernel::getParameters('charset'),
            \etc\Kernel::getParameters('collation'),
            \etc\Kernel::getParameters('lazy')
        );
});

$kernel->set('mysql-adapter', function () use ($kernel) {
    return new \etc\data\Repositories\Adapter\MySQLAdapter(
        $kernel->get('mysql')
    );
});