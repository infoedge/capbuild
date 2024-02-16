<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subloctemp}}`.
 */
class m240129_115052_create_subloctemp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subloctemp}}', [
            'id' => $this->primaryKey(),
            'sublocation' => $this->string(30)->notNull(),
            'location' => $this->string(30)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%subloctemp}}');
    }
}
