<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel".
 *
 * @property int $id
 * @property string $name
 * @property int $isHD
 * @property string $image
 *
 * @property ChannelChannelcategory[] $channelChannelcategories
 * @property ChannelChannelpackage[] $channelChannelpackages
 * @property ChannelProgramm[] $channelProgramms
 */
class Channel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'isHD', 'image'], 'required'],
            [['name'], 'string'],
            [['isHD'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'isHD' => 'Is Hd',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannelChannelcategories()
    {
        return $this->hasMany(ChannelChannelcategory::className(), ['channel_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannelChannelpackages()
    {
        return $this->hasMany(ChannelChannelpackage::className(), ['channel_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannelProgramms()
    {
        return $this->hasMany(ChannelProgramm::className(), ['channel_id' => 'id']);
    }
}
