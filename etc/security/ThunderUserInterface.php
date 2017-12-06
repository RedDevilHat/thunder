<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 29.11.2017
 * Time: 0:58
 */

namespace etc\security;


interface ThunderUserInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     * @return ThunderUserInterface
     */
    public function setId(int $id);

    /**
     * @return string
     */
    public function getUsername(): string;

    /**
     * @param string $username
     * @return ThunderUserInterface
     */
    public function setUsername(string $username);

    /**
     * @return string
     */
    public function getPassword(): string;

    /**
     * @param string $password
     * @return ThunderUserInterface
     */
    public function setPassword(string $password);

    /**
     * @return int
     */
    public function getTokenId(): int;

    /**
     * @param int $tokenId
     * @return ThunderUserInterface
     */
    public function setTokenId(int $tokenId);

    /**
     * @return int
     */
    public function getRoleId(): int;

    /**
     * @param int $role
     * @return ThunderUserInterface
     */
    public function setRoleId(int $role);
}