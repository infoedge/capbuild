<?php

namespace backend\modules\authorization\controllers;

use backend\modules\authorization\models\Approvalcontrol;
use backend\modules\authorization\models\ApprovalcontrolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ApprovalcontrolsController implements the CRUD actions for Approvalcontrol model.
 */
class ApprovalcontrolController extends Controller
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
                //'access'=>
            ]
        );
    }

    /**
     * Lists all Approvalcontrol models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ApprovalcontrolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Approvalcontrol model.
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
     * Creates a new Approvalcontrol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Approvalcontrol();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $this->reorderup($model->serialOrder);
                $model->save();
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
     * Updates an existing Approvalcontrol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->mybegindate = $model->beginDate; 
        if ($this->request->isPost && $model->load($this->request->post()) ) {
            if($this->reorderdown($model->serialOrder)===0){//close gap
                $model->serialOrder=$this->nextOrder();
            }elseif($this->reorderdown($model->serialOrder)===1){
                $this->reorderup($model->serialOrder);
            }
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Approvalcontrol model.
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
     * Finds the Approvalcontrol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Approvalcontrol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Approvalcontrol::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    protected function nextOrder()
    {
        return Approvalcontrol::find()->where(['endDate'=>null])->count()+1;
    }
    
    /**
     * 
     * @param type $id
     * @throws string
     */
    protected function reorderup($id)
    {
        $statusCount = Approvalcontrol::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('approvalcontrol',[
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
        $statusCount = Approvalcontrol::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('approvalcontrol',[
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
