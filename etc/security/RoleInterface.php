<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 29.11.2017
 * Time: 11:32
 */

namespace etc\security;


interface RoleInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param int $id
     *
     * @return RoleInterface
     */
    public function setId(int $id): RoleInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $username
     *
     * @return RoleInterface
     */
    public function setName(string $username): RoleInterface;
}