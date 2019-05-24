<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car_model}}`.
 */
class m190208_011737_create_car_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car_model}}', [
            'id' => $this->primaryKey(),
            'category' => $this->integer(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'picture' => $this->string()->defaultValue(null),
            'engine_volume' => $this->string(),
            'engine_type' => $this->string(),
            'fuel_consumption' => $this->float(),
            'seats' => $this->integer(),
            'body' => $this->string(),
            'doors' => $this->integer(),
            'transmission' => $this->string(),
            'air_conditioning' => $this->integer()->defaultValue(0),
            'count' => $this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car_model}}');
    }
}
