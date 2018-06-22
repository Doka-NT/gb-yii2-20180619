<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $count
 * @property string $email_provider
 * @property int $provider_id
 * @property string $created
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'count', 'email_provider', 'provider_id', 'created'], 'required'],
            [['count', 'provider_id'], 'integer'],
            [['created'], 'safe'],
            [['name', 'email_provider'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name of geek',
            'count' => 'Count',
            'email_provider' => 'Email Provider',
            'provider_id' => 'Provider ID',
            'created' => 'Created',
        ];
    }
}
