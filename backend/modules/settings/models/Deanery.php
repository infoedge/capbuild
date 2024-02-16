<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "deanery".
 *
 * @property int $id
 * @property int $dioceseId
 * @property string $deaneryName
 * @property string $startDate
 * @property string|null $endDate
 * @property int|null $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Diocese $diocese
 * @property Parish[] $parishes
 */
class Deanery extends \yii\db\ActiveRecord
{
    public $mystartdate;
    public $myenddate;
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
            [['dioceseId', 'deaneryName', 'startDate'], 'required'],
            [['dioceseId', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createDate'], 'safe'],
            [['deaneryName'], 'string', 'max' => 50],
            [['deaneryName'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
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
            'dioceseId' => Yii::t('app', 'Diocese Name'),
            'deaneryName' => Yii::t('app', 'Deanery Name'),
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
