<?php

use yii\db\Migration;

/**
 * Handles the creation of table `provincia`.
 * Has foreign keys to the tables:
 *
 * - `pais`
 */
class m180629_223007_create_provincia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('provincia', [
            'id' => $this->primaryKey(),
            'pais_id' => $this->integer()->notNull(),
            'Provincia' => $this->string(100)->notNull(),
        ]);

        // creates index for column `pais_id`
        $this->createIndex(
            'idx-provincia-pais_id',
            'provincia',
            'pais_id'
        );

        // add foreign key for table `pais`
        $this->addForeignKey(
            'fk-provincia-pais_id',
            'provincia',
            'pais_id',
            'pais',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `pais`
        $this->dropForeignKey(
            'fk-provincia-pais_id',
            'provincia'
        );

        // drops index for column `pais_id`
        $this->dropIndex(
            'idx-provincia-pais_id',
            'provincia'
        );

        $this->dropTable('provincia');
    }
}
