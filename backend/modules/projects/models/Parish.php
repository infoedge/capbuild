<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "parish".
 *
 * @property int $id
 * @property int $deaneryId
 * @property string $parishName
 *
 * @property Deanery $deanery
 * @property Localchurch[] $localchurches
 */
class Parish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deaneryId', 'parishName'], 'required'],
            [['deaneryId'], 'integer'],
            [['parishName'], 'string', 'max' => 30],
            [['parishName'], 'unique'],
            [['deaneryId'], 'exist', 'skipOnError' => true, 'targetClass' => Deanery::class, 'targetAttribute' => ['deaneryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'deaneryId' => Yii::t('app', 'Deanery ID'),
            'parishName' => Yii::t('app', 'Parish Name'),
        ];
    }

    /**
     * Gets query for [[Deanery]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeanery()
    {
        return $this->hasOne(Deanery::class, ['id' => 'deaneryId']);
    }

    /**
     * Gets query for [[Localchurches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalchurches()
    {
        return $this->hasMany(Localchurch::class, ['parishId' => 'id']);
    }
}
