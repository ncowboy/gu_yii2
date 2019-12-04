<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m191204_213151_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'start' => $this->integer(11),
            'end' => $this->integer(11),
            'author_id' => $this->integer(11),
            'description' => $this->string(4096)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%events}}');
    }
}
