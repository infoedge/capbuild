<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%theproject}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%members}}`
 * - `{{%projectstatuses}}`
 * - `{{%wards}}`
 * - `{{%sublocations}}`
 * - `{{%user}}`
 */
class m240202_143805_create_theproject_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%theproject}}', [
            'id' => $this->primaryKey(),
            'memberId' => $this->integer()->notNull(),
            'title' => $this->string(30)->notNull()->unique(),
            'description' => $this->string(500)->notNull()->unique(),
            'status' => $this->integer()->notNull(),
            'lat' => $this->double(),
            'lng' => $this->double(),
            'wardNo' => $this->integer(),
            'road' => $this->string(50),
            'sublocation' => $this->integer(),
            'plot' => $this->string(50),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp()->notNull(),
        ]);

        // creates index for column `memberId`
        $this->createIndex(
            '{{%idx-theproject-memberId}}',
            '{{%theproject}}',
            'memberId'
        );

        // add foreign key for table `{{%members}}`
        $this->addForeignKey(
            '{{%fk-theproject-memberId}}',
            '{{%theproject}}',
            'memberId',
            '{{%members}}',
            'id',
            'CASCADE'
        );

        // creates index for column `status`
        $this->createIndex(
            '{{%idx-theproject-status}}',
            '{{%theproject}}',
            'status'
        );

        // add foreign key for table `{{%projectstatuses}}`
        $this->addForeignKey(
            '{{%fk-theproject-status}}',
            '{{%theproject}}',
            'status',
            '{{%projectstatuses}}',
            'id',
            'CASCADE'
        );

        // creates index for column `wardNo`
        $this->createIndex(
            '{{%idx-theproject-wardNo}}',
            '{{%theproject}}',
            'wardNo'
        );

        // add foreign key for table `{{%wards}}`
        $this->addForeignKey(
            '{{%fk-theproject-wardNo}}',
            '{{%theproject}}',
            'wardNo',
            '{{%wards}}',
            'id',
            'CASCADE'
        );

        // creates index for column `sublocation`
        $this->createIndex(
            '{{%idx-theproject-sublocation}}',
            '{{%theproject}}',
            'sublocation'
        );

        // add foreign key for table `{{%sublocations}}`
        $this->addForeignKey(
            '{{%fk-theproject-sublocation}}',
            '{{%theproject}}',
            'sublocation',
            '{{%sublocations}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-theproject-createdBy}}',
            '{{%theproject}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-theproject-createdBy}}',
            '{{%theproject}}',
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
        // drops foreign key for table `{{%members}}`
        $this->dropForeignKey(
            '{{%fk-theproject-memberId}}',
            '{{%theproject}}'
        );

        // drops index for column `memberId`
        $this->dropIndex(
            '{{%idx-theproject-memberId}}',
            '{{%theproject}}'
        );

        // drops foreign key for table `{{%projectstatuses}}`
        $this->dropForeignKey(
            '{{%fk-theproject-status}}',
            '{{%theproject}}'
        );

        // drops index for column `status`
        $this->dropIndex(
            '{{%idx-theproject-status}}',
            '{{%theproject}}'
        );

        // drops foreign key for table `{{%wards}}`
        $this->dropForeignKey(
            '{{%fk-theproject-wardNo}}',
            '{{%theproject}}'
        );

        // drops index for column `wardNo`
        $this->dropIndex(
            '{{%idx-theproject-wardNo}}',
            '{{%theproject}}'
        );

        // drops foreign key for table `{{%sublocations}}`
        $this->dropForeignKey(
            '{{%fk-theproject-sublocation}}',
            '{{%theproject}}'
        );

        // drops index for column `sublocation`
        $this->dropIndex(
            '{{%idx-theproject-sublocation}}',
            '{{%theproject}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-theproject-createdBy}}',
            '{{%theproject}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-theproject-createdBy}}',
            '{{%theproject}}'
        );

        $this->dropTable('{{%theproject}}');
    }
}
