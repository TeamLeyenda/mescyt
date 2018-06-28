<?php

use yii\db\Migration;

/**
 * Handles the creation of table `afiliacion`.
 */
class m180628_000941_create_afiliacion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('afiliacion', [
            'id' => $this->primaryKey(),
            'Afiliacion' => $this->string(50),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('afiliacion');
    }
}
