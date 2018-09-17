<?php

use yii\db\Migration;

/**
 * Handles the creation of table `channel_channelpackage`.
 * Has foreign keys to the tables:
 *
 * - `channel`
 * - `channelpackage`
 */
class m180917_202235_create_channel_channelpackage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('channel_channelpackage', [
            'id' => $this->primaryKey(),
            'channel_id' => $this->integer(),
            'package_id' => $this->integer(),
        ]);

        // creates index for column `channel_id`
        $this->createIndex(
            'idx-channel_channelpackage-channel_id',
            'channel_channelpackage',
            'channel_id'
        );

        // add foreign key for table `channel`
        $this->addForeignKey(
            'fk-channel_channelpackage-channel_id',
            'channel_channelpackage',
            'channel_id',
            'channel',
            'id',
            'CASCADE'
        );

        // creates index for column `package_id`
        $this->createIndex(
            'idx-channel_channelpackage-package_id',
            'channel_channelpackage',
            'package_id'
        );

        // add foreign key for table `channelpackage`
        $this->addForeignKey(
            'fk-channel_channelpackage-package_id',
            'channel_channelpackage',
            'package_id',
            'channelpackage',
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
            'fk-channel_channelpackage-channel_id',
            'channel_channelpackage'
        );

        // drops index for column `channel_id`
        $this->dropIndex(
            'idx-channel_channelpackage-channel_id',
            'channel_channelpackage'
        );

        // drops foreign key for table `channelpackage`
        $this->dropForeignKey(
            'fk-channel_channelpackage-package_id',
            'channel_channelpackage'
        );

        // drops index for column `package_id`
        $this->dropIndex(
            'idx-channel_channelpackage-package_id',
            'channel_channelpackage'
        );

        $this->dropTable('channel_channelpackage');
    }
}
