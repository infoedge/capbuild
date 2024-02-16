<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "deanery".
 *
 * @property int $id
 * @property int $dioceseId
 * @property string $deaneryName
 *
 * @property Diocese $diocese
 * @property Parish[] $parishes
 */
class Deanery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deanery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dioceseId', 'deaneryName'], 'required'],
            [['dioceseId'], 'integer'],
            [['deaneryName'], 'string', 'max' => 30],
            [['deaneryName'], 'unique'],
            [['dioceseId'], 'exist', 'skipOnError' => true, 'targetClass' => Diocese::class, 'targetAttribute' => ['dioceseId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dioceseId' => Yii::t('app', 'Diocese ID'),
            'deaneryName' => Yii::t('app', 'Deanery Name'),
        ];
    }

    /**
     * Gets query for [[Diocese]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiocese()
    {
        return $this->hasOne(Diocese::class, ['id' => 'dioceseId']);
    }

    /**
     * Gets query for [[Parishes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParishes()
    {
        return $this->hasMany(Parish::class, ['deaneryId' => 'id']);
    }
}
