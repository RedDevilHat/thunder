<?php
/**
 * Created by PhpStorm.
 * User: rny
 * Date: 08.12.2017
 * Time: 16:32
 */

namespace etc\data\Migration;


interface MigrationInterface
{
    /**
     * Up migration
     */
    public function up() : void;

    /**
     * Rollback migration
     */
    public function down() : void;
}