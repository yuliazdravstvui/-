<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property string $username
 * @property string $brand
 *
 * @property Parcing[] $parcings
 * @property User $username0
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'brand'], 'required'],
            [['username', 'brand'], 'string', 'max' => 20],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'brand' => 'Brand',
        ];
    }

    /**
     * Gets query for [[Parcings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcings()
    {
        return $this->hasMany(Parcing::class, ['car_id' => 'id']);
    }

    /**
     * Gets query for [[Username0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(User::class, ['username' => 'username']);
    }
}
