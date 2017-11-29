<?php

$kernel->set('user_repository', function () {
   return new \Src\Repositories\UserRepositories();
});