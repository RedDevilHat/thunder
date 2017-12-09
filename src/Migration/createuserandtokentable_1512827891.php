<?php

namespace Src\Migration;

use Database\Connection;
use etc\data\Migration\Migration;
use etc\data\Migration\MigrationInterface;

class createuserandtokentable_1512827891 extends Migration implements MigrationInterface
{
    protected $db = 'mysql';

    public function up(): void
    {
        /** @var Connection $connection */
        $connection = $this->getConnection();

        $pdo = $connection->getPdo();
        $pdo->beginTransaction();
        try {
            $query = $pdo->query(
            /** @lang MySQL */
                'CREATE TABLE user(
	                  id INT AUTO_INCREMENT
		                     PRIMARY KEY,
	                  username TEXT NULL,
	                  password TEXT NULL,
	                  token_id INT NULL,
	                  role_id INT NULL,
	                  CONSTRAINT user_id_uindex
		              UNIQUE (id)
                      )
                      ENGINE=InnoDB;');

            $query->execute();

            $query = $pdo->query(
            /** @lang MySQL */
                'CREATE TABLE token(
	                  id INT AUTO_INCREMENT
		              PRIMARY KEY,
	                  token VARCHAR(512) NOT NULL,
	                  user_id INT NOT NULL,
	                  expired_at DATETIME NOT NULL,
	                  CONSTRAINT token_id_uindex
		              UNIQUE (id))
                      ENGINE=InnoDB;');

            $query->execute();

            $query = $pdo->query(
            /** @lang MySQL */
                'ALTER TABLE `user` ADD FOREIGN KEY FK_USER_TOKEN (id) REFERENCES token(user_id);');
            $query->execute();

            $query = $pdo->query(
            /** @lang MySQL */
                'ALTER TABLE `token` ADD FOREIGN KEY FK_USER_TOKEN (id) REFERENCES user(token_id);');
            $query->execute();
            $pdo->commit();
        } catch (\Exception $exception) {
            $pdo->rollBack();
        }

    }


    public function down(): void
    {
        //TODO Add Down code here
    }
}
