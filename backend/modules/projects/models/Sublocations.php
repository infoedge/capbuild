<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "sublocations".
 *
 * @property int $id
 * @property int|null $locationId
 * @property string|null $sublocationName
 *
 * @property Wards $location
 * @property Theproject[] $theprojects
 */
class Sublocations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sublocations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['locationId'], 'integer'],
            [['sublocationName'], 'string', 'max' => 30],
            [['locationId'], 'exist', 'skipOnError' => true, 'targetClass' => Wards::class, 'targetAttribute' => ['locationId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'locationId' => Yii::t('app', 'Location ID'),
            'sublocationName' => Yii::t('app', 'Sublocation Name'),
        ];
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Wards::class, ['id' => 'locationId']);
    }

    /**
     * Gets query for [[Theprojects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheprojects()
    {
        return $this->hasMany(Theproject::class, ['sublocation' => 'id']);
    }
}
