<?php

use yii\db\Migration;

/**
 * Handles the creation of table `congreso`.
 * Has foreign keys to the tables:
 *
 * - `provincia`
 */
class m180629_223008_create_congreso_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('congreso', [
            'id' => $this->primaryKey(),
            'provincia_id' => $this->integer()->notNull(),
            'Nombre' => $this->string()->notNull()->defaultValue(100),
            'Fecha_Inicio' => $this->datetime()->notNull(),
            'Fecha_Final' => $this->datetime()->notNull(),
        ]);

        // creates index for column `provincia_id`
        $this->createIndex(
            'idx-congreso-provincia_id',
            'congreso',
            'provincia_id'
        );

        // add foreign key for table `provincia`
        $this->addForeignKey(
            'fk-congreso-provincia_id',
            'congreso',
            'provincia_id',
            'provincia',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `provincia`
        $this->dropForeignKey(
            'fk-congreso-provincia_id',
            'congreso'
        );

        // drops index for column `provincia_id`
        $this->dropIndex(
            'idx-congreso-provincia_id',
            'congreso'
        );

        $this->dropTable('congreso');
    }
}
