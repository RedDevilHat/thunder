<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 10:17
 */

namespace etc\data\MySQL;


use etc\data\Data;

/**
 * Class DataBase
 *
 * @package etc\data\MySQL
 */
class DataBase implements Data
{
    public $type = 'mysql';

    /** @var \PDO */
    private $connection = null;

    private $dsn;
    private $username;
    private $passwd;

    public function __construct(string $dsn, string $username, string $passwd)
    {
        $this->dsn      = $dsn;
        $this->username = $username;
        $this->passwd   = $passwd;
    }

    public function setConnection()
    {
        $this->connection = new \PDO(
            $this->dsn,
            $this->username,
            $this->passwd
        );
    }

    /**
     * @return \PDO
     */
    public function init() : \PDO
    {
        if ($this->connection) {
            return $this->connection;
        }

        $this->setConnection();

        return $this->connection;
    }

}