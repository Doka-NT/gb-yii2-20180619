<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property string $text
 * @property int $creator
 * @property string $date_create
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'creator'], 'required'],
            [['text'], 'string'],
            [['creator'], 'integer'],
            [['date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'creator' => 'Creator',
            'date_create' => 'Date Create',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\NoteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\NoteQuery(get_called_class());
    }
}
