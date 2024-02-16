<?php

namespace frontend\modules\membership\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

use frontend\modules\membership\models\Members;


/**
 * Default controller for the `membership` module
 */
class DefaultController extends Controller
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
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $theMember = Members::findOne(['userId'=>Yii::$app->user->id]);
        return $this->render('index',[
            'theMmber'=>$theMember,
        ]);
    }
}
