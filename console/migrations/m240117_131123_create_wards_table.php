<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wards}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%county}}`
 * - `{{%constituency}}`
 */
class m240117_131123_create_wards_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wards}}', [
            'id' => $this->primaryKey(),
            'countyNo' => $this->integer()->notNull(),
            'constituencyNo' => $this->integer()->notNull(),
            'wardName' => $this->string(30)->notNull(),
        ]);

        // creates index for column `countyNo`
        $this->createIndex(
            '{{%idx-wards-countyNo}}',
            '{{%wards}}',
            'countyNo'
        );

        // add foreign key for table `{{%county}}`
        $this->addForeignKey(
            '{{%fk-wards-countyNo}}',
            '{{%wards}}',
            'countyNo',
            '{{%county}}',
            'id',
            'CASCADE'
        );

        // creates index for column `constituencyNo`
        $this->createIndex(
            '{{%idx-wards-constituencyNo}}',
            '{{%wards}}',
            'constituencyNo'
        );

        // add foreign key for table `{{%constituency}}`
        $this->addForeignKey(
            '{{%fk-wards-constituencyNo}}',
            '{{%wards}}',
            'constituencyNo',
            '{{%constituency}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%county}}`
        $this->dropForeignKey(
            '{{%fk-wards-countyNo}}',
            '{{%wards}}'
        );

        // drops index for column `countyNo`
        $this->dropIndex(
            '{{%idx-wards-countyNo}}',
            '{{%wards}}'
        );

        // drops foreign key for table `{{%constituency}}`
        $this->dropForeignKey(
            '{{%fk-wards-constituencyNo}}',
            '{{%wards}}'
        );

        // drops index for column `constituencyNo`
        $this->dropIndex(
            '{{%idx-wards-constituencyNo}}',
            '{{%wards}}'
        );

        $this->dropTable('{{%wards}}');
    }
}
