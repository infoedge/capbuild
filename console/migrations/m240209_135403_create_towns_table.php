<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%towns}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%country}}`
 * - `{{%county}}`
 */
class m240209_135403_create_towns_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%towns}}', [
            'id' => $this->primaryKey(),
            'countryId' => $this->integer()->notNull(),
            'subcountryId' => $this->integer()->notNull(),
            'townName' => $this->string(50)->notNull()->unique(),
        ]);

        // creates index for column `countryId`
        $this->createIndex(
            '{{%idx-towns-countryId}}',
            '{{%towns}}',
            'countryId'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-towns-countryId}}',
            '{{%towns}}',
            'countryId',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `subcountryId`
        $this->createIndex(
            '{{%idx-towns-subcountryId}}',
            '{{%towns}}',
            'subcountryId'
        );

        // add foreign key for table `{{%county}}`
        $this->addForeignKey(
            '{{%fk-towns-subcountryId}}',
            '{{%towns}}',
            'subcountryId',
            '{{%county}}',
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
            '{{%fk-towns-countryId}}',
            '{{%towns}}'
        );

        // drops index for column `countryId`
        $this->dropIndex(
            '{{%idx-towns-countryId}}',
            '{{%towns}}'
        );

        // drops foreign key for table `{{%county}}`
        $this->dropForeignKey(
            '{{%fk-towns-subcountryId}}',
            '{{%towns}}'
        );

        // drops index for column `subcountryId`
        $this->dropIndex(
            '{{%idx-towns-subcountryId}}',
            '{{%towns}}'
        );

        $this->dropTable('{{%towns}}');
    }
}
