<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "constituency".
 *
 * @property int $id
 * @property int|null $countyNo
 * @property string|null $constituencyName
 *
 * @property County $countyNo0
 * @property Wards[] $wards
 */
class Constituency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'constituency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countyNo'], 'integer'],
            [['constituencyName'], 'string', 'max' => 30],
            [['constituencyName'], 'unique'],
            [['countyNo'], 'exist', 'skipOnError' => true, 'targetClass' => County::class, 'targetAttribute' => ['countyNo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countyNo' => Yii::t('app', 'County No'),
            'constituencyName' => Yii::t('app', 'Constituency Name'),
        ];
    }

    /**
     * Gets query for [[CountyNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountyNo0()
    {
        return $this->hasOne(County::class, ['id' => 'countyNo']);
    }

    /**
     * Gets query for [[Wards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWards()
    {
        return $this->hasMany(Wards::class, ['constituencyNo' => 'id']);
    }
}
