<?php

use yii\db\Migration;

/**
 * Class m191204_214104_add_fk_events_user
 */
class m191204_214104_add_fk_events_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'events_fk1',
            'events',
            'id_user',
            'users',
            'id',
            'CASCADE'
            );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('events_fk1', 'events');
    }
}
