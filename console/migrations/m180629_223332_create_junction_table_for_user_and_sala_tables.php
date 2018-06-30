<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_sala`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `sala`
 */
class m180629_223332_create_junction_table_for_user_and_sala_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_sala', [
            'user_id' => $this->integer(),
            'sala_id' => $this->integer(),
            'PRIMARY KEY(user_id, sala_id)',
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_sala-user_id',
            'user_sala',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_sala-user_id',
            'user_sala',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `sala_id`
        $this->createIndex(
            'idx-user_sala-sala_id',
            'user_sala',
            'sala_id'
        );

        // add foreign key for table `sala`
        $this->addForeignKey(
            'fk-user_sala-sala_id',
            'user_sala',
            'sala_id',
            'sala',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_sala-user_id',
            'user_sala'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_sala-user_id',
            'user_sala'
        );

        // drops foreign key for table `sala`
        $this->dropForeignKey(
            'fk-user_sala-sala_id',
            'user_sala'
        );

        // drops index for column `sala_id`
        $this->dropIndex(
            'idx-user_sala-sala_id',
            'user_sala'
        );

        $this->dropTable('user_sala');
    }
}
