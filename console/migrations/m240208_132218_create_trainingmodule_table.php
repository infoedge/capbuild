<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trainingmodule}}`.
 */
class m240208_132218_create_trainingmodule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trainingmodule}}', [
            'id' => $this->primaryKey(),
            'moduleName' => $this->string(50)->notNull()->unique(),
            'description' => $this->string(250)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trainingmodule}}');
    }
}
