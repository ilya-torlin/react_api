<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre_programm".
 *
 * @property int $id
 * @property int $genre_id
 * @property int $programm_id
 *
 * @property Genre $genre
 * @property Programm $programm
 */
class GenreProgramm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre_programm';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'genre_id', 'programm_id'], 'required'],
            [['id', 'genre_id', 'programm_id'], 'integer'],
            [['id'], 'unique'],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
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
            'genre_id' => 'Genre ID',
            'programm_id' => 'Programm ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramm()
    {
        return $this->hasOne(Programm::className(), ['id' => 'programm_id']);
    }
}
