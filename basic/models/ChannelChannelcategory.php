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
 * @property Channel $channel
 * @property Channelcategory $category
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
            [['id', 'channel_id', 'category_id'], 'required'],
            [['id', 'channel_id', 'category_id'], 'integer'],
            [['id'], 'unique'],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channelcategory::className(), 'targetAttribute' => ['category_id' => 'id']],
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
    public function getChannel()
    {
        return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Channelcategory::className(), ['id' => 'category_id']);
    }
}
