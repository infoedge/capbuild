<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "parish".
 *
 * @property int $id
 * @property int $deaneryId
 * @property string $parishName
 * @property string $startDate
 * @property string|null $endDate
 * @property int|null $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Deanery $deanery
 * @property Localchurch[] $localchurches
 */
class Parish extends \yii\db\ActiveRecord
{
    public $mystartdate;
    public $myenddate;
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
            [['deaneryId', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createDate'], 'safe'],
            [['parishName'], 'string', 'max' => 50],
            [['parishName'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
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
            'deaneryId' => Yii::t('app', 'Deanery'),
            'parishName' => Yii::t('app', 'Parish Name'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'mystartdate' => Yii::t('app', 'Commencement Date'),
            'myenddate' => Yii::t('app', 'End Date'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createDate' => Yii::t('app', 'Create Date'),
        ];
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'createdBy']);
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
