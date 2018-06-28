<?php

use yii\db\Migration;

/**
 * Handles the creation of table `area_especializacion`.
 */
class m180628_042722_create_area_especializacion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('area_especializacion', [
            'id' => $this->primaryKey(),
            'area' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('area_especializacion');
    }
}
