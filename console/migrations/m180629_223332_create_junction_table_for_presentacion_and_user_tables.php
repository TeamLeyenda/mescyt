<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentacion_user`.
 * Has foreign keys to the tables:
 *
 * - `presentacion`
 * - `user`
 */
class m180629_223332_create_junction_table_for_presentacion_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentacion_user', [
            'presentacion_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(presentacion_id, user_id)',
        ]);

        // creates index for column `presentacion_id`
        $this->createIndex(
            'idx-presentacion_user-presentacion_id',
            'presentacion_user',
            'presentacion_id'
        );

        // add foreign key for table `presentacion`
        $this->addForeignKey(
            'fk-presentacion_user-presentacion_id',
            'presentacion_user',
            'presentacion_id',
            'presentacion',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-presentacion_user-user_id',
            'presentacion_user',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-presentacion_user-user_id',
            'presentacion_user',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `presentacion`
        $this->dropForeignKey(
            'fk-presentacion_user-presentacion_id',
            'presentacion_user'
        );

        // drops index for column `presentacion_id`
        $this->dropIndex(
            'idx-presentacion_user-presentacion_id',
            'presentacion_user'
        );

        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-presentacion_user-user_id',
            'presentacion_user'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-presentacion_user-user_id',
            'presentacion_user'
        );

        $this->dropTable('presentacion_user');
    }
}
