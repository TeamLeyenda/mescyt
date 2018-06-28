<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentador_sala`.
 * Has foreign keys to the tables:
 *
 * - `presentador`
 * - `sala`
 */
class m180628_042737_create_junction_table_for_presentador_and_sala_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentador_sala', [
            'presentador_id' => $this->integer(),
            'sala_id' => $this->integer(),
            'PRIMARY KEY(presentador_id, sala_id)',
        ]);

        // creates index for column `presentador_id`
        $this->createIndex(
            'idx-presentador_sala-presentador_id',
            'presentador_sala',
            'presentador_id'
        );

        // add foreign key for table `presentador`
        $this->addForeignKey(
            'fk-presentador_sala-presentador_id',
            'presentador_sala',
            'presentador_id',
            'presentador',
            'id',
            'CASCADE'
        );

        // creates index for column `sala_id`
        $this->createIndex(
            'idx-presentador_sala-sala_id',
            'presentador_sala',
            'sala_id'
        );

        // add foreign key for table `sala`
        $this->addForeignKey(
            'fk-presentador_sala-sala_id',
            'presentador_sala',
            'sala_id',
            'sala',
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
            'fk-presentador_sala-presentador_id',
            'presentador_sala'
        );

        // drops index for column `presentador_id`
        $this->dropIndex(
            'idx-presentador_sala-presentador_id',
            'presentador_sala'
        );

        // drops foreign key for table `sala`
        $this->dropForeignKey(
            'fk-presentador_sala-sala_id',
            'presentador_sala'
        );

        // drops index for column `sala_id`
        $this->dropIndex(
            'idx-presentador_sala-sala_id',
            'presentador_sala'
        );

        $this->dropTable('presentador_sala');
    }
}
