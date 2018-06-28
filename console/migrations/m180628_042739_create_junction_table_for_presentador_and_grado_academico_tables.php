<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentador_grado_academico`.
 * Has foreign keys to the tables:
 *
 * - `presentador`
 * - `grado_academico`
 */
class m180628_042739_create_junction_table_for_presentador_and_grado_academico_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentador_grado_academico', [
            'presentador_id' => $this->integer(),
            'grado_academico_id' => $this->integer(),
            'PRIMARY KEY(presentador_id, grado_academico_id)',
        ]);

        // creates index for column `presentador_id`
        $this->createIndex(
            'idx-presentador_grado_academico-presentador_id',
            'presentador_grado_academico',
            'presentador_id'
        );

        // add foreign key for table `presentador`
        $this->addForeignKey(
            'fk-presentador_grado_academico-presentador_id',
            'presentador_grado_academico',
            'presentador_id',
            'presentador',
            'id',
            'CASCADE'
        );

        // creates index for column `grado_academico_id`
        $this->createIndex(
            'idx-presentador_grado_academico-grado_academico_id',
            'presentador_grado_academico',
            'grado_academico_id'
        );

        // add foreign key for table `grado_academico`
        $this->addForeignKey(
            'fk-presentador_grado_academico-grado_academico_id',
            'presentador_grado_academico',
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
        // drops foreign key for table `presentador`
        $this->dropForeignKey(
            'fk-presentador_grado_academico-presentador_id',
            'presentador_grado_academico'
        );

        // drops index for column `presentador_id`
        $this->dropIndex(
            'idx-presentador_grado_academico-presentador_id',
            'presentador_grado_academico'
        );

        // drops foreign key for table `grado_academico`
        $this->dropForeignKey(
            'fk-presentador_grado_academico-grado_academico_id',
            'presentador_grado_academico'
        );

        // drops index for column `grado_academico_id`
        $this->dropIndex(
            'idx-presentador_grado_academico-grado_academico_id',
            'presentador_grado_academico'
        );

        $this->dropTable('presentador_grado_academico');
    }
}
