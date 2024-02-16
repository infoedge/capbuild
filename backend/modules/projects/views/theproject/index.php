<?php

use backend\modules\projects\models\Theproject;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\projects\models\TheprojectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Projects List');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theproject-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Project'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'member.fullMemberName',
            'title',
            'description',
            'status',
            //'lat',
            //'lng',
            //'wardNo',
            //'road',
            //'sublocation',
            //'plot',
            //'createdBy',
            //'createDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Theproject $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
