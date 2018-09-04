<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "channel_programm".
 *
 * @property int $id
 * @property int $channel_id
 * @property int $programm_id
 * @property string $time
 * @property string $date
 * @property int $HD
 *
 * @property Channel $channel
 * @property Programm $programm
 */
class ChannelProgramm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'channel_programm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'channel_id', 'programm_id', 'time', 'date'], 'required'],
            [['id', 'channel_id', 'programm_id', 'HD'], 'integer'],
            [['time'], 'string'],
            [['date'], 'safe'],
            [['id'], 'unique'],
            [['channel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel_id' => 'id']],
            [['programm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programm::className(), 'targetAttribute' => ['programm_id' => 'id']],
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
            'programm_id' => 'Programm ID',
            'time' => 'Time',
            'date' => 'Date',
            'HD' => 'Hd',
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
    public function getProgramm()
    {
        return $this->hasOne(Programm::className(), ['id' => 'programm_id']);
    }
}
