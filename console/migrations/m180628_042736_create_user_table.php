<?php

use yii\db\Migration;
use mdm\admin\components\Configs;

class m180628_042736_create_user_table extends Migration
{

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $userTable = Configs::instance()->userTable;
        $db = Configs::userDb();

        // Check if the table exists
        if ($db->schema->getTableSchema($userTable, true) === null) {
            $this->createTable($userTable, [
                'id' => $this->primaryKey(),
                'moderador_id' => $this->integer()->unique(),
                'participante_id' => $this->integer()->unique(),
                'presentador_id' => $this->integer()->unique(),
                'username' => $this->string(32)->notNull(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'email' => $this->string()->notNull()->unique(),
                'status' => $this->smallInteger()->notNull()->defaultValue(10),
                'created_at' => $this->integer()->notNull(),
                'updated_at' => $this->integer()->notNull(),
                'image' => $this->string(),
                ], $tableOptions);
        }

        // creates index for column `moderador_id`
        $this->createIndex(
            'idx-user-moderador_id',
            'user',
            'moderador_id'
        );

        // add foreign key for table `moderador`
        $this->addForeignKey(
            'fk-user-moderador_id',
            'user',
            'moderador_id',
            'moderador',
            'id',
            'CASCADE'
        );

        // creates index for column `participante_id`
        $this->createIndex(
            'idx-user-participante_id',
            'user',
            'participante_id'
        );

        // add foreign key for table `participante`
        $this->addForeignKey(
            'fk-user-participante_id',
            'user',
            'participante_id',
            'participante',
            'id',
            'CASCADE'
        );

        // creates index for column `presentador_id`
        $this->createIndex(
            'idx-user-presentador_id',
            'user',
            'presentador_id'
        );

        // add foreign key for table `presentador`
        $this->addForeignKey(
            'fk-user-presentador_id',
            'user',
            'presentador_id',
            'presentador',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {

        // drops foreign key for table `moderador`
        $this->dropForeignKey(
            'fk-user-moderador_id',
            'user'
        );

        // drops index for column `moderador_id`
        $this->dropIndex(
            'idx-user-moderador_id',
            'user'
        );

        // drops foreign key for table `participante`
        $this->dropForeignKey(
            'fk-user-participante_id',
            'user'
        );

        // drops index for column `participante_id`
        $this->dropIndex(
            'idx-user-participante_id',
            'user'
        );

        // drops foreign key for table `presentador`
        $this->dropForeignKey(
            'fk-user-presentador_id',
            'user'
        );

        // drops index for column `presentador_id`
        $this->dropIndex(
            'idx-user-presentador_id',
            'user'
        );

        $userTable = Configs::instance()->userTable;
        $db = Configs::userDb();
        if ($db->schema->getTableSchema($userTable, true) !== null) {
            $this->dropTable($userTable);
        }

    }
}
