<?php

use yii\db\Migration;

class m180707_161644_create_table_tipo_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tipo_user}}', [
            'id' => $this->primaryKey(),
            'Tipo' => $this->string(),
        ], $tableOptions);

        $this->createIndex('Tipo', '{{%tipo_user}}', 'Tipo', true);
    }

    public function down()
    {
        $this->dropTable('{{%tipo_user}}');
    }
}
