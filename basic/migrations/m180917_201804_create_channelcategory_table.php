<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channelcategory`.
 */
class m180917_201804_create_channelcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channelcategory', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('channelcategory');
    }
}
