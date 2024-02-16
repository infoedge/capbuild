<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%constituency}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%county}}`
 */
class m240117_131024_create_constituency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%constituency}}', [
            'id' => $this->primaryKey(),
            'countyNo' => $this->integer(),
            'constituencyName' => $this->string(30)->unique(),
        ]);

        // creates index for column `countyNo`
        $this->createIndex(
            '{{%idx-constituency-countyNo}}',
            '{{%constituency}}',
            'countyNo'
        );

        // add foreign key for table `{{%county}}`
        $this->addForeignKey(
            '{{%fk-constituency-countyNo}}',
            '{{%constituency}}',
            'countyNo',
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
        // drops foreign key for table `{{%county}}`
        $this->dropForeignKey(
            '{{%fk-constituency-countyNo}}',
            '{{%constituency}}'
        );

        // drops index for column `countyNo`
        $this->dropIndex(
            '{{%idx-constituency-countyNo}}',
            '{{%constituency}}'
        );

        $this->dropTable('{{%constituency}}');
    }
}
