<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trainingvenues}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%towns}}`
 */
class m240210_054257_create_trainingvenues_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trainingvenues}}', [
            'id' => $this->primaryKey(),
            'venueName' => $this->string(50)->notNull(),
            'description' => $this->string(250)->notNull(),
            'town' => $this->integer()->notNull(),
        ]);

        // creates index for column `town`
        $this->createIndex(
            '{{%idx-trainingvenues-town}}',
            '{{%trainingvenues}}',
            'town'
        );

        // add foreign key for table `{{%towns}}`
        $this->addForeignKey(
            '{{%fk-trainingvenues-town}}',
            '{{%trainingvenues}}',
            'town',
            '{{%towns}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%towns}}`
        $this->dropForeignKey(
            '{{%fk-trainingvenues-town}}',
            '{{%trainingvenues}}'
        );

        // drops index for column `town`
        $this->dropIndex(
            '{{%idx-trainingvenues-town}}',
            '{{%trainingvenues}}'
        );

        $this->dropTable('{{%trainingvenues}}');
    }
}
