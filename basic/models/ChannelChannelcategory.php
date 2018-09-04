<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel_channelcategory".
 *
 * @property int $id
 * @property int $channel_id
 * @property int $category_id
 *
 * @property Channelcategory $category
 * @property Channel $channel
 */
class ChannelChannelcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel_channelcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['channel_id', 'category_id'], 'required'],
            [['channel_id', 'category_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channelcategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel_id' => 'id']],
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
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Channelcategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }
}
