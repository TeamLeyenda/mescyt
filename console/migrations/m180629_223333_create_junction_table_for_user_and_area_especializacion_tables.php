<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_area_especializacion`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `area_especializacion`
 */
class m180629_223333_create_junction_table_for_user_and_area_especializacion_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_area_especializacion', [
            'user_id' => $this->integer(),
            'area_especializacion_id' => $this->integer(),
            'PRIMARY KEY(user_id, area_especializacion_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_area_especializacion-user_id',
            'user_area_especializacion',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_area_especializacion-user_id',
            'user_area_especializacion',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `area_especializacion_id`
        $this->createIndex(
            'idx-user_area_especializacion-area_especializacion_id',
            'user_area_especializacion',
            'area_especializacion_id'
        );

        // add foreign key for table `area_especializacion`
        $this->addForeignKey(
            'fk-user_area_especializacion-area_especializacion_id',
            'user_area_especializacion',
            'area_especializacion_id',
            'area_especializacion',
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
            'fk-user_area_especializacion-user_id',
            'user_area_especializacion'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_area_especializacion-user_id',
            'user_area_especializacion'
        );

        // drops foreign key for table `area_especializacion`
        $this->dropForeignKey(
            'fk-user_area_especializacion-area_especializacion_id',
            'user_area_especializacion'
        );

        // drops index for column `area_especializacion_id`
        $this->dropIndex(
            'idx-user_area_especializacion-area_especializacion_id',
            'user_area_especializacion'
        );

        $this->dropTable('user_area_especializacion');
    }
}
