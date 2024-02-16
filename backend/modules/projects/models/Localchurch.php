<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "localchurch".
 *
 * @property int $id
 * @property int $parishId
 * @property string $churchName
 *
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
            [['parishId', 'churchName'], 'required'],
            [['parishId'], 'integer'],
            [['churchName'], 'string', 'max' => 50],
            [['churchName'], 'unique'],
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
        ];
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
