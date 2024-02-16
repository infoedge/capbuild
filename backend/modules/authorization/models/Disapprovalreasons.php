<?php

namespace backend\modules\authorization\models;

use Yii;

/**
 * This is the model class for table "disapprovalreasons".
 *
 * @property int $id
 * @property string $reason
 *
 * @property Approvals[] $approvals
 */
class Disapprovalreasons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disapprovalreasons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason'], 'required'],
            [['reason'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reason' => Yii::t('app', 'Reason'),
        ];
    }

    /**
     * Gets query for [[Approvals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovals()
    {
        return $this->hasMany(Approvals::class, ['disapprovalReason' => 'id']);
    }
}
