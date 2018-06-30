<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_grado_academico`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `grado_academico`
 */
class m180629_223334_create_junction_table_for_user_and_grado_academico_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_grado_academico', [
            'user_id' => $this->integer(),
            'grado_academico_id' => $this->integer(),
            'PRIMARY KEY(user_id, grado_academico_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_grado_academico-user_id',
            'user_grado_academico',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_grado_academico-user_id',
            'user_grado_academico',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `grado_academico_id`
        $this->createIndex(
            'idx-user_grado_academico-grado_academico_id',
            'user_grado_academico',
            'grado_academico_id'
        );

        // add foreign key for table `grado_academico`
        $this->addForeignKey(
            'fk-user_grado_academico-grado_academico_id',
            'user_grado_academico',
            'grado_academico_id',
            'grado_academico',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_grado_academico-user_id',
            'user_grado_academico'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_grado_academico-user_id',
            'user_grado_academico'
        );

        // drops foreign key for table `grado_academico`
        $this->dropForeignKey(
            'fk-user_grado_academico-grado_academico_id',
            'user_grado_academico'
        );

        // drops index for column `grado_academico_id`
        $this->dropIndex(
            'idx-user_grado_academico-grado_academico_id',
            'user_grado_academico'
        );

        $this->dropTable('user_grado_academico');
    }
}
