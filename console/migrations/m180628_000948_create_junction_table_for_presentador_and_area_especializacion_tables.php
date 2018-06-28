<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentador_area_especializacion`.
 * Has foreign keys to the tables:
 *
 * - `presentador`
 * - `area_especializacion`
 */
class m180628_000948_create_junction_table_for_presentador_and_area_especializacion_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentador_area_especializacion', [
            'presentador_id' => $this->integer(),
            'area_especializacion_id' => $this->integer(),
            'PRIMARY KEY(presentador_id, area_especializacion_id)',
        ]);

        // creates index for column `presentador_id`
        $this->createIndex(
            'idx-presentador_area_especializacion-presentador_id',
            'presentador_area_especializacion',
            'presentador_id'
        );

        // add foreign key for table `presentador`
        $this->addForeignKey(
            'fk-presentador_area_especializacion-presentador_id',
            'presentador_area_especializacion',
            'presentador_id',
            'presentador',
            'id',
            'CASCADE'
        );

        // creates index for column `area_especializacion_id`
        $this->createIndex(
            'idx-presentador_area_especializacion-area_especializacion_id',
            'presentador_area_especializacion',
            'area_especializacion_id'
        );

        // add foreign key for table `area_especializacion`
        $this->addForeignKey(
            'fk-presentador_area_especializacion-area_especializacion_id',
            'presentador_area_especializacion',
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
        // drops foreign key for table `presentador`
        $this->dropForeignKey(
            'fk-presentador_area_especializacion-presentador_id',
            'presentador_area_especializacion'
        );

        // drops index for column `presentador_id`
        $this->dropIndex(
            'idx-presentador_area_especializacion-presentador_id',
            'presentador_area_especializacion'
        );

        // drops foreign key for table `area_especializacion`
        $this->dropForeignKey(
            'fk-presentador_area_especializacion-area_especializacion_id',
            'presentador_area_especializacion'
        );

        // drops index for column `area_especializacion_id`
        $this->dropIndex(
            'idx-presentador_area_especializacion-area_especializacion_id',
            'presentador_area_especializacion'
        );

        $this->dropTable('presentador_area_especializacion');
    }
}
