<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "trainingvenues".
 *
 * @property int $id
 * @property string $venueName
 * @property string $description
 * @property int $town
 *
 * @property Towns $town0
 */
class Trainingvenues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trainingvenues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['venueName', 'description', 'town'], 'required'],
            [['town'], 'integer'],
            [['venueName'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 250],
            [['town'], 'exist', 'skipOnError' => true, 'targetClass' => Towns::class, 'targetAttribute' => ['town' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'venueName' => Yii::t('app', 'Venue Name'),
            'description' => Yii::t('app', 'Description'),
            'town' => Yii::t('app', 'Town'),
        ];
    }

    /**
     * Gets query for [[Town0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTown0()
    {
        return $this->hasOne(Towns::class, ['id' => 'town']);
    }
}
