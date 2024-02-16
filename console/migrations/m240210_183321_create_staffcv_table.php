<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%staffcv}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%members}}`
 * - `{{%staffattributes}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m240210_183321_create_staffcv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%staffcv}}', [
            'id' => $this->primaryKey(),
            'memberId' => $this->integer()->notNull(),
            'staffAttribId' => $this->integer()->notNull(),
            'attained' => $this->string(250),
            'whereObtained' => $this->string(50)->notNull(),
            'fromDate' => $this->date()->notNull(),
            'toDate' => $this->date(),
            'entryBy' => $this->integer()->notNull(),
            'testimonialCopy' => $this->string(100),
            'entryDate' => $this->timeStamp(),
            'updatedBy' => $this->integer(),
            'updatedDate' => $this->date(),
        ]);

        // creates index for column `memberId`
        $this->createIndex(
            '{{%idx-staffcv-memberId}}',
            '{{%staffcv}}',
            'memberId'
        );

        // add foreign key for table `{{%members}}`
        $this->addForeignKey(
            '{{%fk-staffcv-memberId}}',
            '{{%staffcv}}',
            'memberId',
            '{{%members}}',
            'id',
            'CASCADE'
        );

        // creates index for column `staffAttribId`
        $this->createIndex(
            '{{%idx-staffcv-staffAttribId}}',
            '{{%staffcv}}',
            'staffAttribId'
        );

        // add foreign key for table `{{%staffattributes}}`
        $this->addForeignKey(
            '{{%fk-staffcv-staffAttribId}}',
            '{{%staffcv}}',
            'staffAttribId',
            '{{%staffattributes}}',
            'id',
            'CASCADE'
        );

        // creates index for column `entryBy`
        $this->createIndex(
            '{{%idx-staffcv-entryBy}}',
            '{{%staffcv}}',
            'entryBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-staffcv-entryBy}}',
            '{{%staffcv}}',
            'entryBy',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updatedBy`
        $this->createIndex(
            '{{%idx-staffcv-updatedBy}}',
            '{{%staffcv}}',
            'updatedBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-staffcv-updatedBy}}',
            '{{%staffcv}}',
            'updatedBy',
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
        // drops foreign key for table `{{%members}}`
        $this->dropForeignKey(
            '{{%fk-staffcv-memberId}}',
            '{{%staffcv}}'
        );

        // drops index for column `memberId`
        $this->dropIndex(
            '{{%idx-staffcv-memberId}}',
            '{{%staffcv}}'
        );

        // drops foreign key for table `{{%staffattributes}}`
        $this->dropForeignKey(
            '{{%fk-staffcv-staffAttribId}}',
            '{{%staffcv}}'
        );

        // drops index for column `staffAttribId`
        $this->dropIndex(
            '{{%idx-staffcv-staffAttribId}}',
            '{{%staffcv}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-staffcv-entryBy}}',
            '{{%staffcv}}'
        );

        // drops index for column `entryBy`
        $this->dropIndex(
            '{{%idx-staffcv-entryBy}}',
            '{{%staffcv}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-staffcv-updatedBy}}',
            '{{%staffcv}}'
        );

        // drops index for column `updatedBy`
        $this->dropIndex(
            '{{%idx-staffcv-updatedBy}}',
            '{{%staffcv}}'
        );

        $this->dropTable('{{%staffcv}}');
    }
}
