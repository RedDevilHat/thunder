<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 10:17
 */

namespace etc\data;

/**
 * Interface Data
 *
 * @package etc\data
 */
interface Data
{
    /**
     * Set connection to data source
     *
     * @return mixed
     */
    public function setConnection();

    /**
     * Set singletone
     *
     * @return mixed
     */
    public function init();
}