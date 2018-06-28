<?php

use yii\db\Migration;

/**
 * Handles the creation of table `participante`.
 * Has foreign keys to the tables:
 *
 * - `afiliacion`
 */
class m180628_042731_create_participante_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('participante', [
            'id' => $this->primaryKey(),
            'afiliacion_id' => $this->integer()->notNull(),
            'Nombre' => $this->string(50)->notNull(),
            'Apellido' => $this->string(50),
            'Telefono' => $this->string(20),
        ]);

        // creates index for column `afiliacion_id`
        $this->createIndex(
            'idx-participante-afiliacion_id',
            'participante',
            'afiliacion_id'
        );

        // add foreign key for table `afiliacion`
        $this->addForeignKey(
            'fk-participante-afiliacion_id',
            'participante',
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
            'fk-participante-afiliacion_id',
            'participante'
        );

        // drops index for column `afiliacion_id`
        $this->dropIndex(
            'idx-participante-afiliacion_id',
            'participante'
        );

        $this->dropTable('participante');
    }
}
