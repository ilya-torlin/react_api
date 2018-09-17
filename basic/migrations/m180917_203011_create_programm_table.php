<?php

use yii\db\Migration;

/**
 * Handles the creation of table `programm`.
 */
class m180917_203011_create_programm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('programm', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('programm');
    }
}
