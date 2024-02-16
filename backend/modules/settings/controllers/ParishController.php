<?php

namespace backend\modules\settings\controllers;

use backend\modules\settings\models\Parish;
use backend\modules\settings\models\ParishSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

use backend\modules\settings\models\Localchurch;

/**
 * ParishController implements the CRUD actions for Parish model.
 */
class ParishController extends Controller
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
            ]
        );
    }

    /**
     * Lists all Parish models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ParishSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parish model.
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
     * Creates a new Parish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $session = Yii::$app->session;
        $model = new Parish();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())  ) {
                $model->createdBy = Yii::$app->user->id;
                $model->save();
                $savedOk = $this->addLocalChurch($model);
                $session->setFlash(($savedOk?'success':'warning'), ($savedOk?'Local Church added successefully':'Local Church NOT added !'));
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Parish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->mystartdate = $model->startDate;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Parish model.
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
    
    protected function addLocalChurch($model)
    {
        $localchurchModel = new Localchurch();
        $localchurchModel->parishId = $model->id;
        $localchurchModel->churchName = $model->parishName;
        $localchurchModel->startDate = $model->startDate;
        $localchurchModel->createdBy = $model->createdBy;
        If($localchurchModel->save()){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Finds the Parish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Parish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parish::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
