<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sublocations}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%wards}}`
 */
class m240122_125258_create_sublocations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sublocations}}', [
            'id' => $this->primaryKey(),
            'locationId' => $this->integer(),
            'sublocationName' => $this->string(30),
        ]);

        // creates index for column `locationId`
        $this->createIndex(
            '{{%idx-sublocations-locationId}}',
            '{{%sublocations}}',
            'locationId'
        );

        // add foreign key for table `{{%wards}}`
        $this->addForeignKey(
            '{{%fk-sublocations-locationId}}',
            '{{%sublocations}}',
            'locationId',
            '{{%wards}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%wards}}`
        $this->dropForeignKey(
            '{{%fk-sublocations-locationId}}',
            '{{%sublocations}}'
        );

        // drops index for column `locationId`
        $this->dropIndex(
            '{{%idx-sublocations-locationId}}',
            '{{%sublocations}}'
        );

        $this->dropTable('{{%sublocations}}');
    }
}
