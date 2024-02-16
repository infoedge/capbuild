<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staffattributes}}`.
 */
class m240210_181954_create_staffattributes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staffattributes}}', [
            'id' => $this->primaryKey(),
            'attribName' => $this->string(30)->notNull(),
            'detailRequired' => $this->string(100)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%staffattributes}}');
    }
}
