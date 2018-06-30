<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pais`.
 */
class m180629_223005_create_pais_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('pais', [
            'id' => $this->primaryKey(),
            'Pais' => $this->string()->notNull()->defaultValue(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('pais');
    }
}
