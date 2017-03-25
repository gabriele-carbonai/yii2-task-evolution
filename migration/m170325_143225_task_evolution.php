<?php

use yii\db\Migration;

class m170325_143225_task_evolution extends Migration
{
    public function up()
    {
        $this->createTable('task_evolution', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'title' => $this->string(250)->notNull(),
            'description' => $this->text(),
            'route' => $this->string(250),
            'task_type' => $this->smallInteger(1),
            'task_start' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'task_end' => $this->timestamp(),
            'active' => $this->smallInteger(1)->defaultValue(1)
        ]);
    }


    public function safeDown()
    {
        echo "m170325_143225_task_evolution cannot be reverted.\n";

        return false;
    }
    
    

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170325_143225_task_evolution cannot be reverted.\n";

        return false;
    }
    */
}

