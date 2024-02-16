<?php

use backend\modules\settings\models\Constituency;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\settings\models\ConstituencySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Add/Edit Constituency');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="constituency-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Constituency'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'countyNo0.countyName',
            'constituencyName',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Constituency $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
