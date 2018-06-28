<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentador_presentacion`.
 * Has foreign keys to the tables:
 *
 * - `presentador`
 * - `presentacion`
 */
class m180628_042740_create_junction_table_for_presentador_and_presentacion_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentador_presentacion', [
            'presentador_id' => $this->integer(),
            'presentacion_id' => $this->integer(),
            'PRIMARY KEY(presentador_id, presentacion_id)',
        ]);

        // creates index for column `presentador_id`
        $this->createIndex(
            'idx-presentador_presentacion-presentador_id',
            'presentador_presentacion',
            'presentador_id'
        );

        // add foreign key for table `presentador`
        $this->addForeignKey(
            'fk-presentador_presentacion-presentador_id',
            'presentador_presentacion',
            'presentador_id',
            'presentador',
            'id',
            'CASCADE'
        );

        // creates index for column `presentacion_id`
        $this->createIndex(
            'idx-presentador_presentacion-presentacion_id',
            'presentador_presentacion',
            'presentacion_id'
        );

        // add foreign key for table `presentacion`
        $this->addForeignKey(
            'fk-presentador_presentacion-presentacion_id',
            'presentador_presentacion',
            'presentacion_id',
            'presentacion',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `presentador`
        $this->dropForeignKey(
            'fk-presentador_presentacion-presentador_id',
            'presentador_presentacion'
        );

        // drops index for column `presentador_id`
        $this->dropIndex(
            'idx-presentador_presentacion-presentador_id',
            'presentador_presentacion'
        );

        // drops foreign key for table `presentacion`
        $this->dropForeignKey(
            'fk-presentador_presentacion-presentacion_id',
            'presentador_presentacion'
        );

        // drops index for column `presentacion_id`
        $this->dropIndex(
            'idx-presentador_presentacion-presentacion_id',
            'presentador_presentacion'
        );

        $this->dropTable('presentador_presentacion');
    }
}
