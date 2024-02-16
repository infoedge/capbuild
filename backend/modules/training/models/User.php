<?php

namespace backend\modules\training\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property Approvals[] $approvals
 * @property Deanery[] $deaneries
 * @property Diocese[] $dioceses
 * @property Localchurch[] $localchurches
 * @property Members[] $members
 * @property Members[] $members0
 * @property Parish[] $parishes
 * @property Theproject[] $theprojects
 * @property Trainingunit[] $trainingunits
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    /**
     * Gets query for [[Approvals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApprovals()
    {
        return $this->hasMany(Approvals::class, ['approvalBy' => 'id']);
    }

    /**
     * Gets query for [[Deaneries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeaneries()
    {
        return $this->hasMany(Deanery::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Dioceses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDioceses()
    {
        return $this->hasMany(Diocese::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Localchurches]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLocalchurches()
    {
        return $this->hasMany(Localchurch::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Members0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers0()
    {
        return $this->hasMany(Members::class, ['userId' => 'id']);
    }

    /**
     * Gets query for [[Parishes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParishes()
    {
        return $this->hasMany(Parish::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Theprojects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTheprojects()
    {
        return $this->hasMany(Theproject::class, ['createdBy' => 'id']);
    }

    /**
     * Gets query for [[Trainingunits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingunits()
    {
        return $this->hasMany(Trainingunit::class, ['createdBy' => 'id']);
    }
}
