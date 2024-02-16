<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "towns".
 *
 * @property int $id
 * @property int $countryId
 * @property int $subcountryId
 * @property string $townName
 *
 * @property Country $country
 * @property County $subcountry
 * @property Trainingvenues[] $trainingvenues
 */
class Towns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'towns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryId', 'subcountryId', 'townName'], 'required'],
            [['countryId', 'subcountryId'], 'integer'],
            [['townName'], 'string', 'max' => 50],
            [['townName'], 'unique'],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['countryId' => 'id']],
            [['subcountryId'], 'exist', 'skipOnError' => true, 'targetClass' => County::class, 'targetAttribute' => ['subcountryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countryId' => Yii::t('app', 'Country ID'),
            'subcountryId' => Yii::t('app', 'Subcountry ID'),
            'townName' => Yii::t('app', 'Town Name'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'countryId']);
    }

    /**
     * Gets query for [[Subcountry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcountry()
    {
        return $this->hasOne(County::class, ['id' => 'subcountryId']);
    }

    /**
     * Gets query for [[Trainingvenues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingvenues()
    {
        return $this->hasMany(Trainingvenues::class, ['town' => 'id']);
    }
}
