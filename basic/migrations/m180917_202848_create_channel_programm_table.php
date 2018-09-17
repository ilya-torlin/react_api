<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channel_programm`.
 * Has foreign keys to the tables:
 *
 * - `channel`
 * - `programm`
 */
class m180917_202848_create_channel_programm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channel_programm', [
            'id' => $this->primaryKey(),
            'channel_id' => $this->integer(),
            'programm_id' => $this->integer(),
            'time' => $this->string(),
            'date' => $this->date('YYYY-MM-DD'),
            'HD' => $this->integer(),
        ]);

        // creates index for column `channel_id`
        $this->createIndex(
            'idx-channel_programm-channel_id',
            'channel_programm',
            'channel_id'
        );

        // add foreign key for table `channel`
        $this->addForeignKey(
            'fk-channel_programm-channel_id',
            'channel_programm',
            'channel_id',
            'channel',
            'id',
            'CASCADE'
        );

        // creates index for column `programm_id`
        $this->createIndex(
            'idx-channel_programm-programm_id',
            'channel_programm',
            'programm_id'
        );

        // add foreign key for table `programm`
        $this->addForeignKey(
            'fk-channel_programm-programm_id',
            'channel_programm',
            'programm_id',
            'programm',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `channel`
        $this->dropForeignKey(
            'fk-channel_programm-channel_id',
            'channel_programm'
        );

        // drops index for column `channel_id`
        $this->dropIndex(
            'idx-channel_programm-channel_id',
            'channel_programm'
        );

        // drops foreign key for table `programm`
        $this->dropForeignKey(
            'fk-channel_programm-programm_id',
            'channel_programm'
        );

        // drops index for column `programm_id`
        $this->dropIndex(
            'idx-channel_programm-programm_id',
            'channel_programm'
        );

        $this->dropTable('channel_programm');
    }
}
