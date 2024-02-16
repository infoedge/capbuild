<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%county}}`.
 */
class m240117_130752_create_county_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%county}}', [
            'id' => $this->primaryKey(),
            'countyName' => $this->string(30)->notNull()->unique(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%county}}');
    }
}
