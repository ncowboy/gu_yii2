<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calendar}}`.
 */
class m191204_215957_create_calendar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calendar}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'event_id' => $this->integer(),
            'created_at' => $this->bigInteger(),
            'updated_at' => $this->bigInteger()
        ]);

        $this->addForeignKey(
            'calendar_fk1',
            'calendar',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'calendar_fk2',
            'calendar',
            'event_id',
            'events',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('calendar_fk1', 'calendar');
        $this->dropForeignKey('calendar_fk2', 'calendar');
        $this->dropTable('{{%calendar}}');
    }
}
