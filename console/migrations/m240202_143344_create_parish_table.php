<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%parish}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%deanery}}`
 * - `{{%user}}`
 */
class m240202_143344_create_parish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%parish}}', [
            'id' => $this->primaryKey(),
            'deaneryId' => $this->integer()->notNull(),
            'parishName' => $this->string(50)->notNull()->unique(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp(),
        ]);

        // creates index for column `deaneryId`
        $this->createIndex(
            '{{%idx-parish-deaneryId}}',
            '{{%parish}}',
            'deaneryId'
        );

        // add foreign key for table `{{%deanery}}`
        $this->addForeignKey(
            '{{%fk-parish-deaneryId}}',
            '{{%parish}}',
            'deaneryId',
            '{{%deanery}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-parish-createdBy}}',
            '{{%parish}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-parish-createdBy}}',
            '{{%parish}}',
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
        // drops foreign key for table `{{%deanery}}`
        $this->dropForeignKey(
            '{{%fk-parish-deaneryId}}',
            '{{%parish}}'
        );

        // drops index for column `deaneryId`
        $this->dropIndex(
            '{{%idx-parish-deaneryId}}',
            '{{%parish}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-parish-createdBy}}',
            '{{%parish}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-parish-createdBy}}',
            '{{%parish}}'
        );

        $this->dropTable('{{%parish}}');
    }
}
