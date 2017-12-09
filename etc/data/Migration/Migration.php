<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 08.12.2017
 * Time: 13:40
 */

namespace etc\data\Migration;


use etc\data\DataConnection;
use etc\data\Repositories\Adapter\AdapterInterface;
use etc\Kernel;

/**
 * Class Migration
 *
 * @package etc\data\Migration
 */
abstract class Migration
{
    /** @var string */
    protected $db;

    private $connection;

    /**
     * Migration constructor.
     *
     */
    public function __construct()
    {
       $this->connection = Kernel::getContainer()->get($this->db);
    }



    public function getConnection()
    {
        return $this->connection;
    }
}