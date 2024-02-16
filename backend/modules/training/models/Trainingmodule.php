<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "trainingmodule".
 *
 * @property int $id
 * @property string $moduleName
 * @property string $description
 */
class Trainingmodule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainingmodule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moduleName', 'description'], 'required'],
            [['moduleName'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'moduleName' => Yii::t('app', 'Module Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
