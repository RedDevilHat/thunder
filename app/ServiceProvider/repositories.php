<?php

$kernel->set('user_repository', function () use ($kernel) {
    return $kernel->make(\Src\Repositories\UserRepositories::class);
});

$kernel->set('token_repository', function () use ($kernel) {
    return $kernel->make(\Src\Repositories\TokenRepository::class);
});