<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%car}}`.
 */
class m190207_233255_create_car_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%car}}', [
            'id' => $this->primaryKey(),
            'model' => $this->integer(),
            'color' => $this->string()->defaultValue(null),
            'license_plate' => $this->string(),
            'busy' => $this->integer()->defaultValue(0),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%car}}');
    }
}
