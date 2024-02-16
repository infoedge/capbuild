<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "coursemodules".
 *
 * @property int $id
 * @property string $moduleName
 * @property string $description
 * @property float $duration
 */
class Coursemodules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coursemodules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['moduleName', 'description', 'duration'], 'required'],
            [['duration'], 'number'],
            [['moduleName'], 'string', 'max' => 30],
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
            'duration' => Yii::t('app', 'Duration(Hours)'),
        ];
    }
}
