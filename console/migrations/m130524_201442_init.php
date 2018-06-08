<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('auth', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'refresh_token' => $this->string(32)->notNull()->unique(),
            'long_term' => $this->boolean()->notNull()->defaultValue(0),
            'client_id' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk-auth-user_id-user-id', 'auth', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

        $this->insert('user',array(
         'id'=>'1',
         'username' =>'admin',
         'auth_key' =>'0kbz5NBDNr50ysOb4pEGtjbV5-KuK_Se',
         'password_hash' =>'$2y$13$q4PYUvlSvRa6I1cuzcZ.BOEhPc21o/qquVjIzywV5HELpm9uH8rqi',
         'password_reset_token' =>'NULL',
         'email' =>'crisflowbg11@gmail.com',
         'status' =>10,
         'created_at' =>1528492219,
         'updated_at' =>1528492219,
  		));
    }

    public function down()
    {
        $this->dropTable('auth');
        $this->dropTable('user');
    }
}
