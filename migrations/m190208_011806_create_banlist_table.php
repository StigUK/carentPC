<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banlist}}`.
 */
class m190208_011806_create_banlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banlist}}', [
            'id' => $this->primaryKey(),
            'user' => $this->integer(),
            'date_from' => $this->date(),
            'date_to' => $this->date(),
            'reason' => $this->string(),
            'active' => $this->integer()->defaultValue(1),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%banlist}}');
    }
}
