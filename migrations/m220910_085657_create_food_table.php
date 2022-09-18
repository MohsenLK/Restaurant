<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%food}}`.
 */
class m220910_085657_create_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%food}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'type' => $this->string(),
            'contents' => $this->string(),
            'recipe' => $this->string(),
            'quantity' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%food}}');
    }
}
