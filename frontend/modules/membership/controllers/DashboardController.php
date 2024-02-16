<?php

namespace frontend\modules\membership\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

use frontend\modules\membership\models\Members;

class DashboardController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                   
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
         $theMember = Members::find()->where(['userId'=>Yii::$app->user->id])->one();
        return $this->render('index',[
            'theMember'=>$theMember,
        ]);
    }

}
