<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel_channelpackage".
 *
 * @property int $id
 * @property int $channel_id
 * @property int $package_id
 *
 * @property Channel $channel
 * @property Channelpackage $package
 */
class ChannelChannelpackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel_channelpackage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel_id', 'package_id'], 'required'],
            [['channel_id', 'package_id'], 'integer'],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel_id' => 'id']],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channelpackage::className(), 'targetAttribute' => ['package_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'channel_id' => 'Channel ID',
            'package_id' => 'Package ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Channelpackage::className(), ['id' => 'package_id']);
    }
}
