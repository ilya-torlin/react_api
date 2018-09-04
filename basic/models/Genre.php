<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 *
 * @property GenreProgramm[] $genreProgramms
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
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
    public function getGenreProgramms()
    {
        return $this->hasMany(GenreProgramm::className(), ['genre_id' => 'id']);
    }
}
