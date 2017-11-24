<?php
$kernel->set('homeRepo', function () {
    return new \Src\Repositories\HomeRepositories();
});