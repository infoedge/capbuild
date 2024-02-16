<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%projectstatuses}}`.
 */
class m240113_171941_create_projectstatuses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%projectstatuses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull()->unique(),
            'description' => $this->string(200)->notNull()->unique(),
            'ordering' => $this->integer()->notNull()->unique(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%projectstatuses}}');
    }
}
