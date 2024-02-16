<?php

namespace frontend\modules\membership\controllers;

use frontend\modules\membership\models\Members;
use frontend\modules\membership\models\MembersSearch;
use frontend\modules\membership\models\Country;
use frontend\modules\membership\models\Parish;
use frontend\modules\membership\models\Localchurch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use Yii;



/**
 * MembersController implements the CRUD actions for Members model.
 */
class RegistrationController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
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
            ]
        );
    }

    /**
     * Lists all Members models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Members model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Members();

        $model->email=Yii::$app->memberdetails->getEmail();
        $model->mydiocese = 1;
        
        //$model->nationality = 116;
        //$model->phone = "+254";

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $model->createdBy  = Yii::$app->user->id;
                $model->userId = Yii::$app->user->id;
                $model->save();
                return $this->redirect(['dashboard/index'/*, 'id' => $model->id*/]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['dashboard/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Members model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionExtractDialcode($id)
    {
        $code =  Country::find()->where(['id'=>$id])->one();
        echo Json::encode('+'.$code['dialCode']);
    }
    
    public function actionLocalchurchList($id)
    {
        $localchurchList = Localchurch::find()->where(['parishId'=>$id])->all();
        echo Json::encode($localchurchList);
    }
    
    
    public function actionParishList($id)
    {
        $parishList = Parish::find()->where(['deaneryId'=>$id])->all();
        echo Json::encode($parishList);
    }

    /**
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Members::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
