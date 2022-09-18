<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%food_department}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%food}}`
 * - `{{%department}}`
 */
class m220910_085928_create_junction_table_for_food_and_department_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%food_department}}', [
            'id' => $this->primaryKey(),
            'food_id' => $this->integer(),
            'department_id' => $this->integer(),
            
        ]);

        // add foreign key for table `{{%food}}`

        $this->addForeignKey(
            '{{%fk-food_department-food_id}}',
            '{{%food_department}}',
            'food_id',
            '{{%food}}',
            'id',
            'NO ACTION'
        );

        // add foreign key for table `{{%department}}`
        $this->addForeignKey(
            '{{%fk-food_department-department_id}}',
            '{{%food_department}}',
            'department_id',
            '{{%department}}',
            'id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%food}}`
        $this->dropForeignKey(
            '{{%fk-food_department-food_id}}',
            '{{%food_department}}'
        );

        // drops foreign key for table `{{%department}}`
        $this->dropForeignKey(
            '{{%fk-food_department-department_id}}',
            '{{%food_department}}'
        );
        
        $this->dropTable('{{%food_department}}');
    }
}
