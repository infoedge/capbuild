<?php

namespace backend\modules\employees\models;

use Yii;

/**
 * This is the model class for table "staffcv".
 *
 * @property int $id
 * @property int $memberId
 * @property int $staffAttribId
 * @property string|null $attained
 * @property string $whereObtained
 * @property string $fromDate
 * @property string|null $toDate
 * @property int $entryBy
 * @property string|null $testimonialCopy
 * @property string $entryDate
 * @property int|null $updatedBy
 * @property string|null $updatedDate
 *
 * @property User $entryBy0
 * @property Members $member
 * @property Staffattributes $staffAttrib
 * @property User $updatedBy0
 */
class Staffcv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffcv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['memberId', 'staffAttribId', 'whereObtained', 'fromDate', 'entryBy'], 'required'],
            [['memberId', 'staffAttribId', 'entryBy', 'updatedBy'], 'integer'],
            [['fromDate', 'toDate', 'entryDate', 'updatedDate'], 'safe'],
            [['attained'], 'string', 'max' => 250],
            [['whereObtained'], 'string', 'max' => 50],
            [['testimonialCopy'], 'string', 'max' => 100],
            [['entryBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['entryBy' => 'id']],
            [['memberId'], 'exist', 'skipOnError' => true, 'targetClass' => Members::class, 'targetAttribute' => ['memberId' => 'id']],
            [['staffAttribId'], 'exist', 'skipOnError' => true, 'targetClass' => Staffattributes::class, 'targetAttribute' => ['staffAttribId' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updatedBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'memberId' => Yii::t('app', 'Member ID'),
            'staffAttribId' => Yii::t('app', 'Staff Attrib ID'),
            'attained' => Yii::t('app', 'Attained'),
            'whereObtained' => Yii::t('app', 'Where Obtained'),
            'fromDate' => Yii::t('app', 'From Date'),
            'toDate' => Yii::t('app', 'To Date'),
            'entryBy' => Yii::t('app', 'Entry By'),
            'testimonialCopy' => Yii::t('app', 'Testimonial Copy'),
            'entryDate' => Yii::t('app', 'Entry Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updatedDate' => Yii::t('app', 'Updated Date'),
        ];
    }

    /**
     * Gets query for [[EntryBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntryBy0()
    {
        return $this->hasOne(User::class, ['id' => 'entryBy']);
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::class, ['id' => 'memberId']);
    }

    /**
     * Gets query for [[StaffAttrib]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffAttrib()
    {
        return $this->hasOne(Staffattributes::class, ['id' => 'staffAttribId']);
    }

    /**
     * Gets query for [[UpdatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'updatedBy']);
    }
}
