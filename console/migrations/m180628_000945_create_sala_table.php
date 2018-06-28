<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sala`.
 * Has foreign keys to the tables:
 *
 * - `moderador`
 */
class m180628_000945_create_sala_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sala', [
            'id' => $this->primaryKey(),
            'moderador_id' => $this->integer()->notNull(),
            'Nombre_Sala' => $this->string(20)->notNull(),
        ]);

        // creates index for column `moderador_id`
        $this->createIndex(
            'idx-sala-moderador_id',
            'sala',
            'moderador_id'
        );

        // add foreign key for table `moderador`
        $this->addForeignKey(
            'fk-sala-moderador_id',
            'sala',
            'moderador_id',
            'moderador',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `moderador`
        $this->dropForeignKey(
            'fk-sala-moderador_id',
            'sala'
        );

        // drops index for column `moderador_id`
        $this->dropIndex(
            'idx-sala-moderador_id',
            'sala'
        );

        $this->dropTable('sala');
    }
}
