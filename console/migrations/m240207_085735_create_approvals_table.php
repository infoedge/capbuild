<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%approvals}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%approvalcontrol}}`
 * - `{{%disapprovalreasons}}`
 * - `{{%user}}`
 */
class m240207_085735_create_approvals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%approvals}}', [
            'id' => $this->primaryKey(),
            'approvalCntrlId' => $this->integer()->notNull(),
            'disapprovalReason' => $this->integer()->defaultValue(0),
            'approvalDate' => $this->timeStamp()->notNull(),
            'approvalBy' => $this->integer(),
        ]);

        // creates index for column `approvalCntrlId`
        $this->createIndex(
            '{{%idx-approvals-approvalCntrlId}}',
            '{{%approvals}}',
            'approvalCntrlId'
        );

        // add foreign key for table `{{%approvalcontrol}}`
        $this->addForeignKey(
            '{{%fk-approvals-approvalCntrlId}}',
            '{{%approvals}}',
            'approvalCntrlId',
            '{{%approvalcontrol}}',
            'id',
            'CASCADE'
        );

        // creates index for column `disapprovalReason`
        $this->createIndex(
            '{{%idx-approvals-disapprovalReason}}',
            '{{%approvals}}',
            'disapprovalReason'
        );

        // add foreign key for table `{{%disapprovalreasons}}`
        $this->addForeignKey(
            '{{%fk-approvals-disapprovalReason}}',
            '{{%approvals}}',
            'disapprovalReason',
            '{{%disapprovalreasons}}',
            'id',
            'CASCADE'
        );

        // creates index for column `approvalBy`
        $this->createIndex(
            '{{%idx-approvals-approvalBy}}',
            '{{%approvals}}',
            'approvalBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-approvals-approvalBy}}',
            '{{%approvals}}',
            'approvalBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%approvalcontrol}}`
        $this->dropForeignKey(
            '{{%fk-approvals-approvalCntrlId}}',
            '{{%approvals}}'
        );

        // drops index for column `approvalCntrlId`
        $this->dropIndex(
            '{{%idx-approvals-approvalCntrlId}}',
            '{{%approvals}}'
        );

        // drops foreign key for table `{{%disapprovalreasons}}`
        $this->dropForeignKey(
            '{{%fk-approvals-disapprovalReason}}',
            '{{%approvals}}'
        );

        // drops index for column `disapprovalReason`
        $this->dropIndex(
            '{{%idx-approvals-disapprovalReason}}',
            '{{%approvals}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-approvals-approvalBy}}',
            '{{%approvals}}'
        );

        // drops index for column `approvalBy`
        $this->dropIndex(
            '{{%idx-approvals-approvalBy}}',
            '{{%approvals}}'
        );

        $this->dropTable('{{%approvals}}');
    }
}
