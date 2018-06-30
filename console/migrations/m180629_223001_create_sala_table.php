<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sala`.
 */
class m180629_223001_create_sala_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sala', [
            'id' => $this->primaryKey(),
            'Nombre_Sala' => $this->string(20)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('sala');
    }
}
