<?php
/**
 * Created by PhpStorm.
 * User: rassamakhin
 * Date: 28.11.2017
 * Time: 23:07
 */

namespace Src\Entity;


use etc\data\Entity\Entity;

class Home extends Entity
{
    public $id;

    public $info;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Home
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $name
     * @return Home
     */
    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }
}