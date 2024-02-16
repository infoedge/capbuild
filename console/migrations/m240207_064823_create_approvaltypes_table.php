<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%approvaltypes}}`.
 */
class m240207_064823_create_approvaltypes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%approvaltypes}}', [
            'id' => $this->primaryKey(),
            'typeName' => $this->string()->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%approvaltypes}}');
    }
}
