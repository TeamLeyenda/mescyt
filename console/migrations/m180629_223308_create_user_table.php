<?php

use yii\db\Migration;
use mdm\admin\components\Configs;

/**
 * Handles the creation of table `user`.
 * Has foreign keys to the tables:
 *
 * - `afiliacion`
 * - `tipo_user`
 */
class m180629_223308_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $userTable = Configs::instance()->userTable;
        $db = Configs::userDb();
        if ($db->schema->getTableSchema($userTable, true) === null) {
        $this->createTable($userTable, [
            'id' => $this->primaryKey(),
            'afiliacion_id' => $this->integer(),
            'tipo_user_id' => $this->integer(),
            'username' => $this->string(32)->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'image' => $this->string(),
            'Nombre' => $this->string(50),
            'Apellido' => $this->string(20),
            'Telefono' => $this->string(20),
            ], $tableOptions);
        }

        // creates index for column `afiliacion_id`
        $this->createIndex(
            'idx-user-afiliacion_id',
            'user',
            'afiliacion_id'
        );

        // add foreign key for table `afiliacion`
        $this->addForeignKey(
            'fk-user-afiliacion_id',
            'user',
            'afiliacion_id',
            'afiliacion',
            'id',
            'CASCADE'
        );

        // creates index for column `tipo_user_id`
        $this->createIndex(
            'idx-user-tipo_user_id',
            'user',
            'tipo_user_id'
        );

        // add foreign key for table `tipo_user`
        $this->addForeignKey(
            'fk-user-tipo_user_id',
            'user',
            'tipo_user_id',
            'tipo_user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        // drops foreign key for table `afiliacion`
        $this->dropForeignKey(
            'fk-user-afiliacion_id',
            'user'
        );

        // drops index for column `afiliacion_id`
        $this->dropIndex(
            'idx-user-afiliacion_id',
            'user'
        );

        // drops foreign key for table `tipo_user`
        $this->dropForeignKey(
            'fk-user-tipo_user_id',
            'user'
        );

        // drops index for column `tipo_user_id`
        $this->dropIndex(
            'idx-user-tipo_user_id',
            'user'
        );

        $userTable = Configs::instance()->userTable;
        $db = Configs::userDb();
        if ($db->schema->getTableSchema($userTable, true) !== null) {
            $this->dropTable($userTable);
        }
    }
}
