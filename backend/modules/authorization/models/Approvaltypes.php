<?php

namespace backend\modules\authorization\models;

use Yii;

/**
 * This is the model class for table "approvaltypes".
 *
 * @property int $id
 * @property string $typeName
 *
 * @property Approvalcontrol[] $approvalcontrols
 */
class Approvaltypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approvaltypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeName'], 'required'],
            [['typeName'], 'string', 'max' => 255],
            [['typeName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'typeName' => Yii::t('app', 'Type Name'),
        ];
    }

    /**
     * Gets query for [[Approvalcontrols]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovalcontrols()
    {
        return $this->hasMany(Approvalcontrol::class, ['approvalType' => 'id']);
    }
}
