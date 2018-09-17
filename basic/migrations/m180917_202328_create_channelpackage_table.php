<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channelpackage`.
 */
class m180917_202328_create_channelpackage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channelpackage', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('channelpackage');
    }
}
