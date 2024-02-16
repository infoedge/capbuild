<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "wards".
 *
 * @property int $id
 * @property int $countyNo
 * @property int $constituencyNo
 * @property string $wardName
 *
 * @property Constituency $constituencyNo0
 * @property County $countyNo0
 * @property Theproject[] $theprojects
 */
class Wards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countyNo', 'constituencyNo', 'wardName'], 'required'],
            [['countyNo', 'constituencyNo'], 'integer'],
            [['wardName'], 'string', 'max' => 30],
            [['constituencyNo'], 'exist', 'skipOnError' => true, 'targetClass' => Constituency::class, 'targetAttribute' => ['constituencyNo' => 'id']],
            [['countyNo'], 'exist', 'skipOnError' => true, 'targetClass' => County::class, 'targetAttribute' => ['countyNo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countyNo' => Yii::t('app', 'County No'),
            'constituencyNo' => Yii::t('app', 'Constituency No'),
            'wardName' => Yii::t('app', 'Ward Name'),
        ];
    }

    /**
     * Gets query for [[ConstituencyNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConstituencyNo0()
    {
        return $this->hasOne(Constituency::class, ['id' => 'constituencyNo']);
    }

    /**
     * Gets query for [[CountyNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountyNo0()
    {
        return $this->hasOne(County::class, ['id' => 'countyNo']);
    }

    /**
     * Gets query for [[Theprojects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheprojects()
    {
        return $this->hasMany(Theproject::class, ['wardNo' => 'id']);
    }
    
    public function getFullWardName()
    {
        return $this->countyNo0->countyName.'/ '.$this->constituencyNo0->constituencyName.'/ '.$this->wardName;
    }
}
