<?php

namespace backend\modules\authorization\models;

use Yii;

/**
 * This is the model class for table "approvalcontrol".
 *
 * @property int $id
 * @property string $tabName
 * @property string $approvalType
 * @property int $serialOrder
 * @property string $beginDate
 * @property string|null $closeDate
 */
class Approvalcontrol extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'approvalcontrol';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tabName', 'approvalType', 'serialOrder', 'beginDate'], 'required'],
            [['serialOrder'], 'integer'],
            [['beginDate', 'closeDate'], 'safe'],
            [['tabName'], 'string', 'max' => 30],
            [['approvalType'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tabName' => Yii::t('app', 'Table Name'),
            'approvalType' => Yii::t('app', 'Approval Type'),
            'serialOrder' => Yii::t('app', 'Serial Order'),
            'beginDate' => Yii::t('app', 'Begin Date'),
            'closeDate' => Yii::t('app', 'Close Date'),
        ];
    }
    
    public function allTabNames()
    {
        $db_connection = Yii::$app->db;
        $dbSchema = $db_connection->schema;
        $tables = $dbSchema->getTableNames();
        $tableNames = array_filter($tables, function($var) {
             return substr($var, 0, 2) == 'M_';
        });
        return $tableNames;
    }
}
