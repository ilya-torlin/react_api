<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channelpackage".
 *
 * @property int $id
 * @property string $name
 *
 * @property ChannelChannelpackage[] $channelChannelpackages
 */
class Channelpackage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channelpackage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannelChannelpackages()
    {
        return $this->hasMany(ChannelChannelpackage::className(), ['package_id' => 'id']);
    }
}
