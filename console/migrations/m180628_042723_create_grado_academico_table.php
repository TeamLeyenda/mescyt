<?php

use yii\db\Migration;

/**
 * Handles the creation of table `grado_academico`.
 */
class m180628_042723_create_grado_academico_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('grado_academico', [
            'id' => $this->primaryKey(),
            'Grado' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('grado_academico');
    }
}
