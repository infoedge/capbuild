<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "diocese".
 *
 * @property int $id
 * @property int $country
 * @property string $dioceseName
 * @property string $startDate
 * @property string|null $endDate
 * @property int|null $createdBy
 * @property string $createDate
 *
 * @property Country $country0
 * @property User $createdBy0
 * @property Deanery[] $deaneries
 */
class Diocese extends \yii\db\ActiveRecord
{
    public $mystartdate;
    public $myenddate;
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
            [['country', 'dioceseName', 'startDate'], 'required'],
            [['country', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createDate'], 'safe'],
            [['dioceseName'], 'string', 'max' => 50],
            [['dioceseName'], 'unique'],
            [['country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
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
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'mystartdate' => Yii::t('app', 'Commencement Date'),
            'myenddate' => Yii::t('app', 'End Date'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createDate' => Yii::t('app', 'Create Date'),
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
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'createdBy']);
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
