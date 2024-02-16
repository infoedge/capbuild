<?php

use backend\modules\authorization\models\Approvaltypes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\ApprovaltypesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Approval Types');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Authorization', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approvaltypes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Approval Types'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'typeName',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Approvaltypes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                         'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
