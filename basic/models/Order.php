<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $car_id
 * @property int $user_id
 * @property string $date
 * @property int $term
 * @property int $active
 * @property int $price
 *
 * @property Car $car
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id','user_id','term','date'],'required'],
            [['car_id', 'user_id', 'term', 'active', 'price'], 'integer'],
            [['date'], 'default', 'value' => 1552700880],
            [['term'], 'integer', 'min' => 1, 'max' => 20],
            [['price'], 'required'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date' => 'Дата початку оренди',
            'term' => 'Термін оренди (днів)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['id' => 'car_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
