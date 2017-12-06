<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 24.11.2017
 * Time: 10:17
 */

namespace etc\data\MySQL;


use Database\Connection;
use Database\Connectors\ConnectionFactory;
use etc\data\DataConnection;

/**
 * Class DataBase
 *
 * @package etc\data\MySQL
 */
class MySQLConnection implements DataConnection
{
    public $type = 'mysql';

    /** @var Connection */
    private $connection;

    /** @var string */
    private $database;

    /** @var string */
    private $host;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var string */
    private $charset;

    /** @var string */
    private $collation;

    /** @var bool */
    private $lazy;

    /**
     * MySQLConnection constructor.
     * @param string $database
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $charset
     * @param string $collation
     */
    public function __construct(
        string $database,
        string $host,
        string $username,
        string $password,
        string $charset,
        string $collation,
        bool $lazy
    ) {
        $this->database = $database;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->charset = $charset;
        $this->collation = $collation;
        $this->lazy = $lazy;
    }

    public function init(): Connection
    {
        if (!$this->connection) {
            $this->setConnection();
        }

        return $this->connection;
    }

    public function setConnection()
    {
        $factory = new ConnectionFactory();
        $this->connection = $factory->make(array(
            'driver' => $this->type,
            'database' => $this->database,
            'host' => $this->host,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => $this->charset,
            'collation' => $this->collation,

            // Don't connect until we execute our first query
            'lazy' => $this->lazy,
        ));
    }

}