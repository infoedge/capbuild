<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "trainingunit".
 *
 * @property int $id
 * @property int $trainingModuleId
 * @property int $courseModuleId
 * @property string $startDate
 * @property string|null $endDate
 * @property int $createdBy
 * @property string $createdDate
 *
 * @property Coursemodules $courseModule
 * @property User $createdBy0
 * @property Trainingmodule $trainingModule
 */
class Trainingunit extends \yii\db\ActiveRecord
{
    public $mystartdate;
    public $myenddate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainingunit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trainingModuleId', 'courseModuleId', 'startDate'], 'required'],
            [['trainingModuleId', 'courseModuleId', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createdDate'], 'safe'],
            [['courseModuleId'], 'exist', 'skipOnError' => true, 'targetClass' => Coursemodules::class, 'targetAttribute' => ['courseModuleId' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
            [['trainingModuleId'], 'exist', 'skipOnError' => true, 'targetClass' => Trainingmodule::class, 'targetAttribute' => ['trainingModuleId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'trainingModuleId' => Yii::t('app', 'Training Module'),
            'courseModuleId' => Yii::t('app', 'Course Module'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'mystartdate' => Yii::t('app', 'Start Date'),
            'myenddate' => Yii::t('app', 'End Date'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createdDate' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * Gets query for [[CourseModule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseModule()
    {
        return $this->hasOne(Coursemodules::class, ['id' => 'courseModuleId']);
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
     * Gets query for [[TrainingModule]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingModule()
    {
        return $this->hasOne(Trainingmodule::class, ['id' => 'trainingModuleId']);
    }
}
