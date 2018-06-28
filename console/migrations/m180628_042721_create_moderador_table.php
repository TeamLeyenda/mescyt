<?php

use yii\db\Migration;

/**
 * Handles the creation of table `moderador`.
 */
class m180628_042721_create_moderador_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('moderador', [
            'id' => $this->primaryKey(),
            'Nombre' => $this->string(50)->notNull(),
            'Apellido' => $this->string(50),
            'Telefono' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('moderador');
    }
}
