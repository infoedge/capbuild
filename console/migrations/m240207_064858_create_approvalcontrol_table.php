<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%approvalcontrol}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%approvaltypes}}`
 */
class m240207_064858_create_approvalcontrol_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%approvalcontrol}}', [
            'id' => $this->primaryKey(),
            'tabName' => $this->string(30)->notNull(),
            'approvalType' => $this->integer()->notNull(),
            'serialOrder' => $this->integer()->notNull(),
            'beginDate' => $this->date()->notNull(),
            'closeDate' => $this->date(),
        ]);

        // creates index for column `approvalType`
        $this->createIndex(
            '{{%idx-approvalcontrol-approvalType}}',
            '{{%approvalcontrol}}',
            'approvalType'
        );

        // add foreign key for table `{{%approvaltypes}}`
        $this->addForeignKey(
            '{{%fk-approvalcontrol-approvalType}}',
            '{{%approvalcontrol}}',
            'approvalType',
            '{{%approvaltypes}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%approvaltypes}}`
        $this->dropForeignKey(
            '{{%fk-approvalcontrol-approvalType}}',
            '{{%approvalcontrol}}'
        );

        // drops index for column `approvalType`
        $this->dropIndex(
            '{{%idx-approvalcontrol-approvalType}}',
            '{{%approvalcontrol}}'
        );

        $this->dropTable('{{%approvalcontrol}}');
    }
}
