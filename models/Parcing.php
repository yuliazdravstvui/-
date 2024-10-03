<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parcing".
 *
 * @property int $id
 * @property int $car_id
 * @property string $date
 * @property int $price
 * @property int $sale
 * @property int $debt
 *
 * @property Car $car
 */
class Parcing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parcing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'date', 'price', 'sale', 'debt'], 'required'],
            [['car_id', 'price', 'sale', 'debt'], 'integer'],
            [['date'], 'safe'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'date' => 'Date',
            'price' => 'Price',
            'sale' => 'Sale',
            'debt' => 'Debt',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::class, ['id' => 'car_id']);
    }
}
