<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banlist".
 *
 * @property int $id
 * @property int $user
 * @property string $date_from
 * @property string $date_to
 * @property string $reason
 * @property int $active
 *
 * @property User $user0
 */
class Banlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'active'], 'integer'],
            [['date_from', 'date_to'], 'safe'],
            [['reason'], 'string', 'max' => 255],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'date_from' => 'Date From',
            'date_to' => 'Date To',
            'reason' => 'Reason',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }


}
