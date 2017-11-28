<?php
$kernel->set('home_repository', function () {
    return new \Src\Repositories\HomeRepositories();
});