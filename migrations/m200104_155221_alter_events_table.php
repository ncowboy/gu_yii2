<?php

use yii\db\Migration;

/**
 * Class m200104_155221_alter_events_table
 */
class m200104_155221_alter_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('events', 'is_full_day', 'boolean default false');
        $this->addColumn('events', 'is_repeatable', 'boolean default false');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('events', 'is_full_day');
        $this->dropColumn('events', 'is_repeatable');
    }

}
