<?php

use yii\db\Migration;

/**
 * Class m200106_124442_alter_table_events
 */
class m200106_124442_alter_table_events extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('events', 'created_at', 'integer not null');
        $this->addColumn('events', 'updated_at', 'integer not null');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('events', 'created_at');
        $this->dropColumn('events', 'updated_at');
    }
}
