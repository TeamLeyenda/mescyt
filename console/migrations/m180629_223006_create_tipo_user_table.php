<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tipo_user`.
 */
class m180629_223006_create_tipo_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tipo_user', [
            'id' => $this->primaryKey(),
            'Tipo' => $this->string(15)->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tipo_user');
    }
}
