<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "projectstatuses".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $ordering
 * @property string $startDate
 * @property string|null $endDate
 *
 * @property Theproject[] $theprojects
 */
class Projectstatuses extends \yii\db\ActiveRecord
{
    public $myStartDate;
    public $myEndDate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projectstatuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'ordering', 'startDate'], 'required'],
            [['ordering'], 'integer'],
            [['startDate', 'endDate'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['description'], 'string', 'max' => 200],
            [['name'], 'unique'],
            [['description'], 'unique'],
            [['ordering'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Status Name'),
            'description' => Yii::t('app', 'Status Description'),
            'startDate' => Yii::t('app', 'Status Start Date'),
            'endDate' => Yii::t('app', 'Status End Date'),
            'myStartDate' => Yii::t('app', 'Status Start Date'),
            'myEndDate' => Yii::t('app', 'Status End Date'),
        ];
    }

    /**
     * Gets query for [[Theprojects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheprojects()
    {
        return $this->hasMany(Theproject::class, ['status' => 'id']);
    }
}
