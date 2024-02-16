<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "county".
 *
 * @property int $id
 * @property string $countyName
 *
 * @property Constituency[] $constituencies
 * @property Wards[] $wards
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'county';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countyName'], 'required'],
            [['countyName'], 'string', 'max' => 30],
            [['countyName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countyName' => Yii::t('app', 'County Name'),
        ];
    }

    /**
     * Gets query for [[Constituencies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConstituencies()
    {
        return $this->hasMany(Constituency::class, ['countyNo' => 'id']);
    }

    /**
     * Gets query for [[Wards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWards()
    {
        return $this->hasMany(Wards::class, ['countyNo' => 'id']);
    }
}
