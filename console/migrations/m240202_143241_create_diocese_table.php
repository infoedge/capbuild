<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diocese}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 * - `{{%user}}`
 */
class m240202_143241_create_diocese_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diocese}}', [
            'id' => $this->primaryKey(),
            'country' => $this->integer()->notNull(),
            'dioceseName' => $this->string(50)->notNull()->unique(),
            'startDate' => $this->date()->notNull(),
            'endDate' => $this->date(),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp(),
        ]);

        // creates index for column `country`
        $this->createIndex(
            '{{%idx-diocese-country}}',
            '{{%diocese}}',
            'country'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-diocese-country}}',
            '{{%diocese}}',
            'country',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-diocese-createdBy}}',
            '{{%diocese}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-diocese-createdBy}}',
            '{{%diocese}}',
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
        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-diocese-country}}',
            '{{%diocese}}'
        );

        // drops index for column `country`
        $this->dropIndex(
            '{{%idx-diocese-country}}',
            '{{%diocese}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-diocese-createdBy}}',
            '{{%diocese}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-diocese-createdBy}}',
            '{{%diocese}}'
        );

        $this->dropTable('{{%diocese}}');
    }
}
