<?php

use yii\db\Migration;

/**
 * Class m180713_182125_user_log
 */
class m180713_182125_user_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_log', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'logged_at' => $this->timestamp() . ' DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->createIndex('user_id', 'user_log', 'user_id');

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_log');

        return true;
    }
}
