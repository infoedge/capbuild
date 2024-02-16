<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%localchurch}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%parish}}`
 * - `{{%user}}`
 */
class m240202_143517_create_localchurch_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%localchurch}}', [
            'id' => $this->primaryKey(),
            'parishId' => $this->integer()->notNull(),
            'churchName' => $this->string(50)->notNull()->unique(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp(),
        ]);

        // creates index for column `parishId`
        $this->createIndex(
            '{{%idx-localchurch-parishId}}',
            '{{%localchurch}}',
            'parishId'
        );

        // add foreign key for table `{{%parish}}`
        $this->addForeignKey(
            '{{%fk-localchurch-parishId}}',
            '{{%localchurch}}',
            'parishId',
            '{{%parish}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-localchurch-createdBy}}',
            '{{%localchurch}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-localchurch-createdBy}}',
            '{{%localchurch}}',
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
        // drops foreign key for table `{{%parish}}`
        $this->dropForeignKey(
            '{{%fk-localchurch-parishId}}',
            '{{%localchurch}}'
        );

        // drops index for column `parishId`
        $this->dropIndex(
            '{{%idx-localchurch-parishId}}',
            '{{%localchurch}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-localchurch-createdBy}}',
            '{{%localchurch}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-localchurch-createdBy}}',
            '{{%localchurch}}'
        );

        $this->dropTable('{{%localchurch}}');
    }
}
