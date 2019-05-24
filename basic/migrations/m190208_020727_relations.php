<?php

use yii\db\Migration;

/**
 * Class m190208_020727_relations
 */
class m190208_020727_relations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'id-car-car_model_id',
            'car',
            'model'
        );
        $this->addForeignKey(
            'fk-car-car_model_id',
            'car',
            'model',
            'car_model',
            'id'
        );
        $this->createIndex(
            'id-order-car_id',
            'order',
            'car_id'
        );
        $this->addForeignKey(
            'fk-order-car_id',
            'order',
            'car_id',
            'car',
            'id'
        );

        $this->createIndex(
            'id-order-user_id',
            'order',
            'user_id'
        );
        $this->addForeignKey(
            'fk-order-user_id',
            'order',
            'user_id',
            'user',
            'id'
        );
        $this->createIndex(
            'id-car_model-category_id',
            'car_model',
            'category'
        );
        $this->addForeignKey(
            'fk-car_model-category_id',
            'car_model',
            'category',
            'category',
            'id'
        );
        $this->createIndex(
            'id-userinfo-user_id',
            'userinfo',
            'user'
        );
        $this->addForeignKey(
            'fk-userinfo-user_id',
            'userinfo',
            'user',
            'user',
            'id'
        );
        $this->createIndex(
            'id-banlist-user_id',
            'banlist',
            'user'
        );
        $this->addForeignKey(
            'fk-banlist-user_id',
            'banlist',
            'user',
            'user',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190208_020727_relations cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190208_020727_relations cannot be reverted.\n";

        return false;
    }
    */
}
