<?php

namespace backend\modules\settings\models;

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
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Country Name'),
            'symbol' => Yii::t('app', 'Symbol'),
            'currency' => Yii::t('app', 'Currency'),
            'currencyCode' => Yii::t('app', 'Currency Code'),
            'dialCode' => Yii::t('app', 'Dial Code'),
            'countryFlag' => Yii::t('app', 'Country Flag'),
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
