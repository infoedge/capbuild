<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m240103_102250_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45)->unique(),
            'symbol' => $this->string(8),
            'currency' => $this->string(50),
            'currencyCode' => $this->string(5),
            'dialCode' => $this->string(10),
            'countryFlag' => $this->string(30)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
