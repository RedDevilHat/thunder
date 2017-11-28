<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 0:55
 */

namespace Src\Entity;


use etc\data\Entity\Entity;
use etc\security\ThunderUserInterface;

class User extends Entity implements ThunderUserInterface
{
    public $id;
    public $username;
    public $password;
    public $token_id;
    public $role;

    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function setId(int $id): ThunderUserInterface
    {
        // TODO: Implement setId() method.
    }

    public function getUsername(): string
    {
        // TODO: Implement getUsername() method.
    }

    public function setUsername(string $username): ThunderUserInterface
    {
        // TODO: Implement setUsername() method.
    }

    public function getPassword(): string
    {
        // TODO: Implement getPassword() method.
    }

    public function setPassword(string $password): ThunderUserInterface
    {
        // TODO: Implement setPassword() method.
    }

    public function getTokenId(): int
    {
        // TODO: Implement getTokenId() method.
    }

    public function setTokenId(int $tokenId): ThunderUserInterface
    {
        // TODO: Implement setTokenId() method.
    }

    public function getRole(): int
    {
        // TODO: Implement getRole() method.
    }

    public function setRole(int $role): ThunderUserInterface
    {
        // TODO: Implement setRole() method.
    }


}