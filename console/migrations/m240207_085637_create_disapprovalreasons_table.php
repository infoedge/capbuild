<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%disapprovalreasons}}`.
 */
class m240207_085637_create_disapprovalreasons_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%disapprovalreasons}}', [
            'id' => $this->primaryKey(),
            'reason' => $this->string(250)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%disapprovalreasons}}');
    }
}
