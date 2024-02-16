<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "theproject".
 *
 * @property int $id
 * @property int $memberId
 * @property string $title
 * @property string $description
 * @property int $status
 * @property float|null $lat
 * @property float|null $lng
 * @property int|null $wardNo
 * @property string|null $road
 * @property int|null $sublocation
 * @property string|null $plot
 * @property int $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Members $member
 * @property Projectstatuses $status0
 * @property Sublocations $sublocation0
 * @property Wards $wardNo0
 */
class Theproject extends \yii\db\ActiveRecord
{
    public $mycounty;
    public $myconstituency;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theproject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['memberId', 'title', 'description'], 'required'],
            [['memberId', 'status', 'wardNo', 'sublocation', 'createdBy'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['lng'],'double','min'=> -180,'max'=> 180],
            [['lat'],'double','min'=>-90, 'max'=> 90],
            [['createDate'], 'safe'],
            [['title'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 500],
            [['road', 'plot'], 'string', 'max' => 50],
            [['title'], 'unique'],
            [['description'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
            [['memberId'], 'exist', 'skipOnError' => true, 'targetClass' => Members::class, 'targetAttribute' => ['memberId' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Projectstatuses::class, 'targetAttribute' => ['status' => 'id']],
            [['sublocation'], 'exist', 'skipOnError' => true, 'targetClass' => Sublocations::class, 'targetAttribute' => ['sublocation' => 'id']],
            [['wardNo'], 'exist', 'skipOnError' => true, 'targetClass' => Wards::class, 'targetAttribute' => ['wardNo' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'memberId' => Yii::t('app', 'Member ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'lat' => Yii::t('app', 'Latitude'),
            'lng' => Yii::t('app', 'Longtitude'),
            'wardNo' => Yii::t('app', 'Ward/Location Name'),
            'road' => Yii::t('app', 'Road'),
            'sublocation' => Yii::t('app', 'Sublocation'),
            'plot' => Yii::t('app', 'Plot'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createDate' => Yii::t('app', 'Create Date'),
            
            'mycounty' => Yii::t('app', 'County'),
            'myconstituency' => Yii::t('app', 'Constituency/ Sub-county'),
        ];
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::class, ['id' => 'memberId']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Projectstatuses::class, ['id' => 'status']);
    }

    /**
     * Gets query for [[Sublocation0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSublocation0()
    {
        return $this->hasOne(Sublocations::class, ['id' => 'sublocation']);
    }

    /**
     * Gets query for [[WardNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWardNo0()
    {
        return $this->hasOne(Wards::class, ['id' => 'wardNo']);
    }
}
