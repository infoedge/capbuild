<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "diocese".
 *
 * @property int $id
 * @property int $country
 * @property string $dioceseName
 *
 * @property Country $country0
 * @property Deanery[] $deaneries
 */
class Diocese extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diocese';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country', 'dioceseName'], 'required'],
            [['country'], 'integer'],
            [['dioceseName'], 'string', 'max' => 30],
            [['dioceseName'], 'unique'],
            [['country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country' => Yii::t('app', 'Country'),
            'dioceseName' => Yii::t('app', 'Diocese Name'),
        ];
    }

    /**
     * Gets query for [[Country0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry0()
    {
        return $this->hasOne(Country::class, ['id' => 'country']);
    }

    /**
     * Gets query for [[Deaneries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeaneries()
    {
        return $this->hasMany(Deanery::class, ['dioceseId' => 'id']);
    }
}
