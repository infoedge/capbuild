<?php

namespace common\models;

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
 * @property int $createdBy
 * @property string $createDate
 *
 * @property User $createdBy0
 * @property Idtypes $idType0
 * @property Country $nationality0
 * @property User $user
 */
class Members extends \yii\db\ActiveRecord
{
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
            [['userId', 'idType', 'nationality', 'createdBy'], 'integer'],
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
            'id' => 'ID',
            'userId' => 'User ID',
            'surname' => 'Surname',
            'otherNames' => 'Other Names',
            'gender' => 'Gender',
            'idNo' => 'Id No',
            'idType' => 'Id Type',
            'nationality' => 'Nationality',
            'email' => 'Email',
            'phone' => 'Phone',
            'birthDate' => 'Birth Date',
            'createdBy' => 'Created By',
            'createDate' => 'Create Date',
        ];
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'createdBy']);
    }

    /**
     * Gets query for [[IdType0]].
     *
     * @return \yii\db\ActiveQuery|IdtypesQuery
     */
    public function getIdType0()
    {
        return $this->hasOne(Idtypes::class, ['id' => 'idType']);
    }

    /**
     * Gets query for [[Nationality0]].
     *
     * @return \yii\db\ActiveQuery|CountryQuery
     */
    public function getNationality0()
    {
        return $this->hasOne(Country::class, ['id' => 'nationality']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }

    /**
     * {@inheritdoc}
     * @return MembersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MembersQuery(get_called_class());
    }
}
