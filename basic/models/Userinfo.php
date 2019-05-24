<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userinfo".
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $second_name
 * @property int $user
 * @property string $license_id
 * @property string $license_date
 * @property string $photo_license
 * @property string $photo_user
 * @property string $photo_passport
 * @property string $phone_number
 *
 * @property User $user0
 */
class Userinfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userinfo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user'], 'integer'],
            [['license_date'], 'safe'],
            [['first_name', 'middle_name', 'second_name', 'license_id', 'photo_license', 'photo_user', 'photo_passport', 'phone_number'], 'string', 'max' => 255],
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
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'second_name' => 'Second Name',
            'user' => 'User',
            'license_id' => 'License ID',
            'license_date' => 'License Date',
            'photo_license' => 'Photo License',
            'photo_user' => 'Photo User',
            'photo_passport' => 'Photo Passport',
            'phone_number' => 'Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }

    public function getPicture()
    {
        return ($this->photo_user) ? '/uploads/User/' . $this->photo_user : '../../no_image.png';
    }

    public function saveImage($filename)
    {
        $this->photo_user = $filename;
        return $this->save(false);
    }

    public function savepImage($filename)
    {
        $this->photo_passport = $filename;
        return $this->save(false);
    }

    public function savedImage($filename)
    {
        $this->photo_license = $filename;
        return $this->save(false);
    }
}
