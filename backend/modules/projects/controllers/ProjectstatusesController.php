<?php

namespace backend\modules\projects\controllers;

use backend\modules\projects\models\Projectstatuses;
use backend\modules\projects\models\ProjectstatusesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProjectstatusesController implements the CRUD actions for Projectstatuses model.
 */
class ProjectstatusesController extends Controller
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
     * Lists all Projectstatuses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProjectstatusesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projectstatuses model.
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
     * Creates a new Projectstatuses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Projectstatuses();
        $model->ordering = $this->nextOrder();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $this->reorderup($model->ordering);
                $model->save();
                return $this->redirect(['index'/*, 'id' => $model->id*/]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Projectstatuses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) ) {
            
            if($this->reorderdown($model->ordering)===0){//close gap
                $model->ordering=$this->nextOrder();
            }elseif($this->reorderdown($model->ordering)===1){
                $this->reorderup($model->ordering);
            }
            $model->save();
            return $this->redirect(['index'/*, 'id' => $model->id*/]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Projectstatuses model.
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

    /**
     * Finds the Projectstatuses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Projectstatuses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Projectstatuses::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    /**
     * 
     * @return type
     */
    protected function nextOrder()
    {
        return Projectstatuses::find()->where(['endDate'=>null])->count()+1;
    }
    
    /**
     * 
     * @param type $id
     * @throws string
     */
    protected function reorderup($id)
    {
        $statusCount = Projectstatuses::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('projectstatuses',[
                   'ordering' => new \yii\db\Expression('ordering+1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert'=> $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder project statuses: ' . $e->getMessage();
                throw $msg;

            }
        }
    }
    
    /**
     * 
     * @param type $id
     * @return int
     * @throws string
     */
    protected function reorderdown($id)
    {
        $statusCount = Projectstatuses::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('projectstatuses',[
                   'ordering' => new \yii\db\Expression('ordering - 1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert' > $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder project statuses: ' . $e->getMessage();
                throw $msg;

            }
            return 1;//reordering successfully
        }else{
            return 0;//no reordering done
        }
    }
}
