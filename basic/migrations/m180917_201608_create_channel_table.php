<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channel`.
 */
class m180917_201608_create_channel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channel', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'isHD' => $this->integer(),
            'image' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('channel');
    }
}
