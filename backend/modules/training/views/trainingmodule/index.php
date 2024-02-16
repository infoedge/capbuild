<?php

use backend\modules\training\models\Trainingmodule;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\training\models\TrainingmoduleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Add/Edit Training Module');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Training Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingmodule-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Training Module'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'moduleName',
            'description',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trainingmodule $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
