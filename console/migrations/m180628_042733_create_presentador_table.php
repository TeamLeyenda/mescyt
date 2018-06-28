<?php

use yii\db\Migration;

/**
 * Handles the creation of table `presentador`.
 * Has foreign keys to the tables:
 *
 * - `afiliacion`
 */
class m180628_042733_create_presentador_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('presentador', [
            'id' => $this->primaryKey(),
            'afiliacion_id' => $this->integer()->notNull(),
            'Nombre' => $this->string(50)->notNull(),
            'Apellido' => $this->string(50),
            'Telefono' => $this->string(20),
            'Descripcion' => $this->text()->notNull(),
        ]);

        // creates index for column `afiliacion_id`
        $this->createIndex(
            'idx-presentador-afiliacion_id',
            'presentador',
            'afiliacion_id'
        );

        // add foreign key for table `afiliacion`
        $this->addForeignKey(
            'fk-presentador-afiliacion_id',
            'presentador',
            'afiliacion_id',
            'afiliacion',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `afiliacion`
        $this->dropForeignKey(
            'fk-presentador-afiliacion_id',
            'presentador'
        );

        // drops index for column `afiliacion_id`
        $this->dropIndex(
            'idx-presentador-afiliacion_id',
            'presentador'
        );

        $this->dropTable('presentador');
    }
}
