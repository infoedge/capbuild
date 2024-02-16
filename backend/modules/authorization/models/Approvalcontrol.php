<?php

namespace backend\modules\authorization\models;

use Yii;

/**
 * This is the model class for table "approvalcontrol".
 *
 * @property int $id
 * @property string $tabName
 * @property int $approvalType
 * @property int $serialOrder
 * @property string $beginDate
 * @property string|null $closeDate
 *
 * @property Approvaltypes $approvalType0
 */
class Approvalcontrol extends \yii\db\ActiveRecord
{
    public $mybegindate;
    public $myclosedate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approvalcontrol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tabName', 'approvalType', 'serialOrder', 'beginDate'], 'required'],
            [['approvalType', 'serialOrder'], 'integer'],
            [['beginDate', 'closeDate'], 'safe'],
            [['tabName'], 'string', 'max' => 30],
            [['approvalType'], 'exist', 'skipOnError' => true, 'targetClass' => Approvaltypes::class, 'targetAttribute' => ['approvalType' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tabName' => Yii::t('app', 'Table Name'),
            'approvalType' => Yii::t('app', 'Approval Type'),
            'serialOrder' => Yii::t('app', 'Serial Order'),
            'beginDate' => Yii::t('app', 'Begin Date'),
            'closeDate' => Yii::t('app', 'Close Date'),
            'mybegindate' => Yii::t('app', 'Begin Date'),
            'myclosedate' => Yii::t('app', 'Close Date'),
        ];
    }

    /**
     * Gets query for [[ApprovalType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalType0()
    {
        return $this->hasOne(Approvaltypes::class, ['id' => 'approvalType']);
    }
}
