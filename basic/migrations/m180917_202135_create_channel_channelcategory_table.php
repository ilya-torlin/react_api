<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channel_channelcategory`.
 * Has foreign keys to the tables:
 *
 * - `channel`
 * - `channelcategory`
 */
class m180917_202135_create_channel_channelcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channel_channelcategory', [
            'id' => $this->primaryKey(),
            'channel_id' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        // creates index for column `channel_id`
        $this->createIndex(
            'idx-channel_channelcategory-channel_id',
            'channel_channelcategory',
            'channel_id'
        );

        // add foreign key for table `channel`
        $this->addForeignKey(
            'fk-channel_channelcategory-channel_id',
            'channel_channelcategory',
            'channel_id',
            'channel',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            'idx-channel_channelcategory-category_id',
            'channel_channelcategory',
            'category_id'
        );

        // add foreign key for table `channelcategory`
        $this->addForeignKey(
            'fk-channel_channelcategory-category_id',
            'channel_channelcategory',
            'category_id',
            'channelcategory',
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
            'fk-channel_channelcategory-channel_id',
            'channel_channelcategory'
        );

        // drops index for column `channel_id`
        $this->dropIndex(
            'idx-channel_channelcategory-channel_id',
            'channel_channelcategory'
        );

        // drops foreign key for table `channelcategory`
        $this->dropForeignKey(
            'fk-channel_channelcategory-category_id',
            'channel_channelcategory'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-channel_channelcategory-category_id',
            'channel_channelcategory'
        );

        $this->dropTable('channel_channelcategory');
    }
}
