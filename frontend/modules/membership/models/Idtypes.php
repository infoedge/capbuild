<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "idtypes".
 *
 * @property int $id
 * @property string $typeName
 *
 * @property Members[] $members
 */
class Idtypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'idtypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['typeName'], 'required'],
            [['typeName'], 'string', 'max' => 15],
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
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery|MembersQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['idType' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return IdtypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IdtypesQuery(get_called_class());
    }
}
