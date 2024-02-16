<?php

namespace backend\modules\projects\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property int $id
 * @property int|null $userId
 * @property string $surname
 * @property string|null $otherNames
 * @property string $gender
 * @property string $idNo
 * @property int|null $idType
 * @property int|null $nationality
 * @property string $email
 * @property string $phone
 * @property string $birthDate
 * @property int|null $localChurch
 * @property int $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Idtypes $idType0
 * @property Localchurch $localChurch0
 * @property Country $nationality0
 * @property Theproject[] $theprojects
 * @property User $user
 */
class Members extends \yii\db\ActiveRecord
{
    public $mybirthdate;
    public $mydiocese;
    public $mydeanery;
    public $myparish;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'idType', 'nationality', 'localChurch'], 'integer'],
            [['surname', 'gender', 'idNo', 'email', 'phone', 'birthDate', 'createdBy'], 'required'],
            [['birthDate', 'createDate'], 'safe'],
            [['surname', 'phone'], 'string', 'max' => 20],
            [['otherNames'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 1],
            [['idNo'], 'string', 'max' => 12],
            [['email'], 'string', 'max' => 40],
            [['idNo'], 'unique'],
            [['email'], 'unique'],
            [['phone'], 'unique'],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['createdBy' => 'id']],
            [['idType'], 'exist', 'skipOnError' => true, 'targetClass' => Idtypes::class, 'targetAttribute' => ['idType' => 'id']],
            [['localChurch'], 'exist', 'skipOnError' => true, 'targetClass' => Localchurch::class, 'targetAttribute' => ['localChurch' => 'id']],
            [['nationality'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['nationality' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userId' => Yii::t('app', 'User ID'),
            'surname' => Yii::t('app', 'Surname'),
            'otherNames' => Yii::t('app', 'Other Names'),
            'gender' => Yii::t('app', 'Gender'),
            'idNo' => Yii::t('app', 'Id No'),
            'idType' => Yii::t('app', 'Id Type'),
            'nationality' => Yii::t('app', 'Nationality'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'birthDate' => Yii::t('app', 'Birth Date'),
            'mybirthdate' => Yii::t('app', 'Date of Birth'),
            'mydiocese' => Yii::t('app', 'Diocese'),
            'mydeanery' => Yii::t('app', 'Deanery'),
            'myparish' => Yii::t('app', 'Parish'),
            'localChurch' => Yii::t('app', 'Local Church'),
            'createdBy' => Yii::t('app', 'Created By'),
            'createDate' => Yii::t('app', 'Create Date'),
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
     * Gets query for [[IdType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdType0()
    {
        return $this->hasOne(Idtypes::class, ['id' => 'idType']);
    }

    /**
     * Gets query for [[LocalChurch0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalChurch0()
    {
        return $this->hasOne(Localchurch::class, ['id' => 'localChurch']);
    }

    /**
     * Gets query for [[Nationality0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNationality0()
    {
        return $this->hasOne(Country::class, ['id' => 'nationality']);
    }

    /**
     * Gets query for [[Theprojects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheprojects()
    {
        return $this->hasMany(Theproject::class, ['memberId' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }
    public function getRegisteredUser()
    {
        return empty($this->userId)?'N':'Y';
    }
    
    public function getMembersFullName()
    {
        return $this->otherNames . ' ' . $this->surname;
    }
}
