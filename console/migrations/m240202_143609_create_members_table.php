<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%members}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%idTypes}}`
 * - `{{%country}}`
 * - `{{%localchurch}}`
 * - `{{%user}}`
 */
class m240202_143609_create_members_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%members}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer(),
            'surname' => $this->string(20)->notNull(),
            'otherNames' => $this->string(30),
            'gender' => $this->string(1)->notNull(),
            'idNo' => $this->string(12)->notNull()->unique(),
            'idType' => $this->integer(),
            'nationality' => $this->integer(),
            'email' => $this->string(40)->notNull()->unique(),
            'phone' => $this->string(20)->notNull()->unique(),
            'birthDate' => $this->date()->notNull(),
            'localChurch' => $this->integer(),
            'createdBy' => $this->integer()->notNull(),
            'createDate' => $this->timeStamp(),
        ]);

        // creates index for column `userId`
        $this->createIndex(
            '{{%idx-members-userId}}',
            '{{%members}}',
            'userId'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-members-userId}}',
            '{{%members}}',
            'userId',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `idType`
        $this->createIndex(
            '{{%idx-members-idType}}',
            '{{%members}}',
            'idType'
        );

        // add foreign key for table `{{%idTypes}}`
        $this->addForeignKey(
            '{{%fk-members-idType}}',
            '{{%members}}',
            'idType',
            '{{%idTypes}}',
            'id',
            'CASCADE'
        );

        // creates index for column `nationality`
        $this->createIndex(
            '{{%idx-members-nationality}}',
            '{{%members}}',
            'nationality'
        );

        // add foreign key for table `{{%country}}`
        $this->addForeignKey(
            '{{%fk-members-nationality}}',
            '{{%members}}',
            'nationality',
            '{{%country}}',
            'id',
            'CASCADE'
        );

        // creates index for column `localChurch`
        $this->createIndex(
            '{{%idx-members-localChurch}}',
            '{{%members}}',
            'localChurch'
        );

        // add foreign key for table `{{%localchurch}}`
        $this->addForeignKey(
            '{{%fk-members-localChurch}}',
            '{{%members}}',
            'localChurch',
            '{{%localchurch}}',
            'id',
            'CASCADE'
        );

        // creates index for column `createdBy`
        $this->createIndex(
            '{{%idx-members-createdBy}}',
            '{{%members}}',
            'createdBy'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-members-createdBy}}',
            '{{%members}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-members-userId}}',
            '{{%members}}'
        );

        // drops index for column `userId`
        $this->dropIndex(
            '{{%idx-members-userId}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%idTypes}}`
        $this->dropForeignKey(
            '{{%fk-members-idType}}',
            '{{%members}}'
        );

        // drops index for column `idType`
        $this->dropIndex(
            '{{%idx-members-idType}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%country}}`
        $this->dropForeignKey(
            '{{%fk-members-nationality}}',
            '{{%members}}'
        );

        // drops index for column `nationality`
        $this->dropIndex(
            '{{%idx-members-nationality}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%localchurch}}`
        $this->dropForeignKey(
            '{{%fk-members-localChurch}}',
            '{{%members}}'
        );

        // drops index for column `localChurch`
        $this->dropIndex(
            '{{%idx-members-localChurch}}',
            '{{%members}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-members-createdBy}}',
            '{{%members}}'
        );

        // drops index for column `createdBy`
        $this->dropIndex(
            '{{%idx-members-createdBy}}',
            '{{%members}}'
        );

        $this->dropTable('{{%members}}');
    }
}
