<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deanery}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%diocese}}`
 * - `{{%user}}`
 */
class m240202_143309_create_deanery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deanery}}', [
            'id' => $this->primaryKey(),
            'dioceseId' => $this->integer()->notNull(),
            'deaneryName' => $this->string(50)->notNull()->unique(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp(),
        ]);

        // creates index for column `dioceseId`
        $this->createIndex(
            '{{%idx-deanery-dioceseId}}',
            '{{%deanery}}',
            'dioceseId'
        );

        // add foreign key for table `{{%diocese}}`
        $this->addForeignKey(
            '{{%fk-deanery-dioceseId}}',
            '{{%deanery}}',
            'dioceseId',
            '{{%diocese}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-deanery-createdBy}}',
            '{{%deanery}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-deanery-createdBy}}',
            '{{%deanery}}',
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
        // drops foreign key for table `{{%diocese}}`
        $this->dropForeignKey(
            '{{%fk-deanery-dioceseId}}',
            '{{%deanery}}'
        );

        // drops index for column `dioceseId`
        $this->dropIndex(
            '{{%idx-deanery-dioceseId}}',
            '{{%deanery}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-deanery-createdBy}}',
            '{{%deanery}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-deanery-createdBy}}',
            '{{%deanery}}'
        );

        $this->dropTable('{{%deanery}}');
    }
}
