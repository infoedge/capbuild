<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coursemodules}}`.
 */
class m240208_132133_create_coursemodules_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coursemodules}}', [
            'id' => $this->primaryKey(),
            'moduleName' => $this->string(30)->notNull()->unique(),
            'description' => $this->string(250)->unique()->notNull(),
            'duration' => $this->double()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coursemodules}}');
    }
}
