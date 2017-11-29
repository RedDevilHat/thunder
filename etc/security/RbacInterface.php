<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 29.11.2017
 * Time: 11:31
 */

namespace etc\security;

/**
 * Interface RbacInterface
 *
 * @package etc\security
 */
interface RbacInterface
{
    /**
     * @param ThunderUserInterface $user
     *
     * @return RoleInterface
     */
    public function getRole(ThunderUserInterface $user) : RoleInterface;

    /**
     * @param ThunderUserInterface $user
     */
    public function setRole(ThunderUserInterface $user) : void;
}