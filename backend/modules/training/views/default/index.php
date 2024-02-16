<?php

use yii\helpers\Html;
//use yii\bootstrap5\Button;
use yii\helpers\Url;
//use yii\helpers\ArrayHelper;
$this->title = Yii::t('app','Training Switchboard');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="training-default-index">
   <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= $this->title ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 d-grid gap-2">
            <h2>Setup</h2><!-- comment -->
            <?= Html::a('Add/Edit Training Unit', Url::to(['trainingunit/index']), ['class' => 'btn btn-success btn-block']) ?>
            <?= Html::a('Add/Edit Course Modules', Url::to(['coursemodules/index']), ['class' => 'btn btn-success btn-block']) ?>
            <?= Html::a('Add/Edit Training Module', Url::to(['trainingmodule/index']), ['class' => 'btn btn-success btn-block']) ?>
            <?= Html::a('List Training Venues', Url::to(['trainingvenues/index']), ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <div class="col-md-3 d-grid gap-2">
            <h2></h2><!-- comment -->
        </div>
        <div class="col-md-3 d-grid gap-2">
            <h2></h2><!-- comment -->
        </div><!-- comment -->
        <div class="col-md-3 d-grid gap-2">
            <h2></h2><!-- comment -->
        </div>
    </div>
</div>
