<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programm".
 *
 * @property int $id
 * @property string $name
 *
 * @property ChannelProgramm[] $channelProgramms
 * @property GenreProgramm[] $genreProgramms
 */
class Programm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 128],
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
    public function getChannelProgramms()
    {
        return $this->hasMany(ChannelProgramm::className(), ['programm_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenreProgramms()
    {
        return $this->hasMany(GenreProgramm::className(), ['programm_id' => 'id']);
    }
}
