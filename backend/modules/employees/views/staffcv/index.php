<?php

use backend\modules\employees\models\Staffcv;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\employees\models\StaffcvSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Staffcvs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffcv-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Staffcv'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'memberId',
            'staffAttribId',
            'attained',
            'whereObtained',
            //'fromDate',
            //'toDate',
            //'entryBy',
            //'testimonialCopy',
            //'entryDate',
            //'updatedBy',
            //'updatedDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Staffcv $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
