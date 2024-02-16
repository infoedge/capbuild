<?php

namespace backend\modules\employees\models;

use Yii;

/**
 * This is the model class for table "staffattributes".
 *
 * @property int $id
 * @property string $attribName
 * @property string $detailRequired
 *
 * @property Staffcv[] $staffcvs
 */
class Staffattributes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staffattributes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribName', 'detailRequired'], 'required'],
            [['attribName'], 'string', 'max' => 30],
            [['detailRequired'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attribName' => Yii::t('app', 'Attrib Name'),
            'detailRequired' => Yii::t('app', 'Detail Required'),
        ];
    }

    /**
     * Gets query for [[Staffcvs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffcvs()
    {
        return $this->hasMany(Staffcv::class, ['staffAttribId' => 'id']);
    }
}
