<?php

use Src\Security\AuthTokenSecurity;
use Src\http\Middleware\AuthGate;

$kernel->set('auth_token_security', function () use ($kernel) {
    return new AuthTokenSecurity($kernel->get('request'),$kernel);

});


$kernel->set('auth_gate', function () use($kernel) {
    return new AuthGate($kernel->get('auth_token_security'));
});