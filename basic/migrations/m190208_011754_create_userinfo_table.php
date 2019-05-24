<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%userinfo}}`.
 */
class m190208_011754_create_userinfo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%userinfo}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'middle_name' => $this->string(),
            'second_name' => $this->string(),
            'user' => $this->integer(),
            'license_id' => $this->string(),
            'license_date' => $this->date(),
            'photo_license' => $this->string(),
            'photo_user' => $this->string(),
            'photo_passport' => $this->string(),
            'phone_number' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%userinfo}}');
    }
}
