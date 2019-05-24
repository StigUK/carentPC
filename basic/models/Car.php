<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $model
 * @property string $color
 * @property string $license_plate
 * @property int $busy
 *
 * @property CarModel $model0
 * @property Order[] $orders
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
            [['model', 'busy'], 'integer'],
            [['color', 'license_plate'], 'string', 'max' => 255],
            [['model'], 'exist', 'skipOnError' => true, 'targetClass' => CarModel::className(), 'targetAttribute' => ['model' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'color' => 'Color',
            'license_plate' => 'License Plate',
            'busy' => 'Busy',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel0()
    {
        return $this->hasOne(CarModel::className(), ['id' => 'model']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['car_id' => 'id']);
    }
}
