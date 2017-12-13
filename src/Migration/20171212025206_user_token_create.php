<?php


use Phinx\Migration\AbstractMigration;

class UserTokenCreate extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('user')
             ->addColumn('username', 'string')
             ->addColumn('password', 'string')
             ->addColumn('token_id', 'integer')
             ->addTimestamps()
             ->save();

        $this->table('token')
             ->addColumn('token', 'string')
             ->addColumn('user_id', 'integer')
             ->addColumn('expired_at', 'datetime')
             ->addTimestamps()
             ->save();

        $this->table('user')
             ->addForeignKey('token_id', 'token')
             ->save();

        $this->table('token')
             ->addForeignKey('user_id', 'user')
             ->save();
    }
}
