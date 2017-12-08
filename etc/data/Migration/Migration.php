<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 08.12.2017
 * Time: 13:40
 */

namespace etc\data\Migration;


use etc\data\Repositories\Adapter\AdapterInterface;

/**
 * Class Migration
 *
 * @package etc\data\Migration
 */
abstract class Migration
{
    /** @var string */
    protected $db;
    /** @var AdapterInterface */
    private $connection;

    /**
     * Migration constructor.
     *
     * @param $connection
     * @param $db
     */
    public function __construct(AdapterInterface $connection, string $db)
    {
        $this->connection = $connection;
        $this->db         = $db;
    }

    /**
     * @return AdapterInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }
}