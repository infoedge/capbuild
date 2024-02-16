<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "localchurch".
 *
 * @property int $id
 * @property int $parishId
 * @property string $churchName
 * @property string $startDate
 * @property string|null $endDate
 * @property int $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Members[] $members
 * @property Parish $parish
 */
class Localchurch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localchurch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parishId', 'churchName', 'startDate', 'createdBy'], 'required'],
            [['parishId', 'createdBy'], 'integer'],
            [['startDate', 'endDate', 'createDate'], 'safe'],
            [['churchName'], 'string', 'max' => 50],
            [['churchName'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
            [['parishId'], 'exist', 'skipOnError' => true, 'targetClass' => Parish::class, 'targetAttribute' => ['parishId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parishId' => Yii::t('app', 'Parish ID'),
            'churchName' => Yii::t('app', 'Church Name'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
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
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['localChurch' => 'id']);
    }

    /**
     * Gets query for [[Parish]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParish()
    {
        return $this->hasOne(Parish::class, ['id' => 'parishId']);
    }
}
