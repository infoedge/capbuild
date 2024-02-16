<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trainingunit}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%trainingmodule}}`
 * - `{{%coursemodules}}`
 * - `{{%user}}`
 */
class m240208_132259_create_trainingunit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trainingunit}}', [
            'id' => $this->primaryKey(),
            'trainingModuleId' => $this->integer()->notNull(),
            'courseModuleId' => $this->integer()->notNull(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'createdBy' => $this->integer()->notNull(),
            'createdDate' => $this->timeStamp(),
        ]);

        // creates index for column `trainingModuleId`
        $this->createIndex(
            '{{%idx-trainingunit-trainingModuleId}}',
            '{{%trainingunit}}',
            'trainingModuleId'
        );

        // add foreign key for table `{{%trainingmodule}}`
        $this->addForeignKey(
            '{{%fk-trainingunit-trainingModuleId}}',
            '{{%trainingunit}}',
            'trainingModuleId',
            '{{%trainingmodule}}',
            'id',
            'CASCADE'
        );

        // creates index for column `courseModuleId`
        $this->createIndex(
            '{{%idx-trainingunit-courseModuleId}}',
            '{{%trainingunit}}',
            'courseModuleId'
        );

        // add foreign key for table `{{%coursemodules}}`
        $this->addForeignKey(
            '{{%fk-trainingunit-courseModuleId}}',
            '{{%trainingunit}}',
            'courseModuleId',
            '{{%coursemodules}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-trainingunit-createdBy}}',
            '{{%trainingunit}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-trainingunit-createdBy}}',
            '{{%trainingunit}}',
            'createdBy',
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
        // drops foreign key for table `{{%trainingmodule}}`
        $this->dropForeignKey(
            '{{%fk-trainingunit-trainingModuleId}}',
            '{{%trainingunit}}'
        );

        // drops index for column `trainingModuleId`
        $this->dropIndex(
            '{{%idx-trainingunit-trainingModuleId}}',
            '{{%trainingunit}}'
        );

        // drops foreign key for table `{{%coursemodules}}`
        $this->dropForeignKey(
            '{{%fk-trainingunit-courseModuleId}}',
            '{{%trainingunit}}'
        );

        // drops index for column `courseModuleId`
        $this->dropIndex(
            '{{%idx-trainingunit-courseModuleId}}',
            '{{%trainingunit}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-trainingunit-createdBy}}',
            '{{%trainingunit}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-trainingunit-createdBy}}',
            '{{%trainingunit}}'
        );

        $this->dropTable('{{%trainingunit}}');
    }
}
