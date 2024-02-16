<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%idtypes}}`.
 */
class m240103_140840_create_idtypes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%idtypes}}', [
            'id' => $this->primaryKey(),
            'typeName' => $this->string(15)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%idtypes}}');
    }
}
