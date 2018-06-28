<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentacion`.
 * Has foreign keys to the tables:
 *
 * - `congreso`
 */
class m180628_000946_create_presentacion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentacion', [
            'id' => $this->primaryKey(),
            'congreso_id' => $this->integer()->notNull(),
            'Titulo' => $this->string(100)->notNull(),
            'Institucion' => $this->string(50),
            'Area_Tematica' => $this->string(100),
            'Modalidad_Presentacion' => $this->string(20),
            'Fecha_Inicio' => $this->datetime()->notNull(),
            'Fecha_Final' => $this->datetime()->notNull(),
        ]);

        // creates index for column `congreso_id`
        $this->createIndex(
            'idx-presentacion-congreso_id',
            'presentacion',
            'congreso_id'
        );

        // add foreign key for table `congreso`
        $this->addForeignKey(
            'fk-presentacion-congreso_id',
            'presentacion',
            'congreso_id',
            'congreso',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `congreso`
        $this->dropForeignKey(
            'fk-presentacion-congreso_id',
            'presentacion'
        );

        // drops index for column `congreso_id`
        $this->dropIndex(
            'idx-presentacion-congreso_id',
            'presentacion'
        );

        $this->dropTable('presentacion');
    }
}
