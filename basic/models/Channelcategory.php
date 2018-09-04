<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channelcategory".
 *
 * @property int $id
 * @property string $name
 *
 * @property ChannelChannelcategory[] $channelChannelcategories
 */
class Channelcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channelcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string'],
            [['id'], 'unique'],
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
    public function getChannelChannelcategories()
    {
        return $this->hasMany(ChannelChannelcategory::className(), ['category_id' => 'id']);
    }
}
