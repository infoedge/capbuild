<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $symbol
 * @property string|null $currency
 * @property string|null $currencyCode
 * @property string|null $dialCode
 * @property string|null $countryFlag
 *
 * @property Members[] $members
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 45],
            [['symbol'], 'string', 'max' => 8],
            [['currency'], 'string', 'max' => 50],
            [['currencyCode'], 'string', 'max' => 5],
            [['dialCode'], 'string', 'max' => 10],
            [['countryFlag'], 'string', 'max' => 30],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'symbol' => 'Symbol',
            'currency' => 'Currency',
            'currencyCode' => 'Currency Code',
            'dialCode' => 'Dial Code',
            'countryFlag' => 'Country Flag',
        ];
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['nationality' => 'id']);
    }
}
