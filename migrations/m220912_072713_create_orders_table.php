<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%department}}`
 * - `{{%food}}`
 */
class m220912_072713_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user' => $this->string(),
            'adress' => $this->string(),
            'department_id' => $this->integer()->notnull(),
            'food_id' => $this->integer()->notnull(),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            '{{%idx-orders-department_id}}',
            '{{%orders}}',
            'department_id'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-orders-department_id}}',
            '{{%orders}}',
            'department_id',
            '{{%department}}',
            'id',
            'CASCADE'
        );

        // creates index for column `food_id`
        $this->createIndex(
            '{{%idx-orders-food_id}}',
            '{{%orders}}',
            'food_id'
        );

        // add foreign key for table `{{%food}}`
        $this->addForeignKey(
            '{{%fk-orders-food_id}}',
            '{{%orders}}',
            'food_id',
            '{{%food}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-orders-department_id}}',
            '{{%orders}}'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            '{{%idx-orders-department_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%food}}`
        $this->dropForeignKey(
            '{{%fk-orders-food_id}}',
            '{{%orders}}'
        );

        // drops index for column `food_id`
        $this->dropIndex(
            '{{%idx-orders-food_id}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
