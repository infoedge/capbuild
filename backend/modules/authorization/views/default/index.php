<?php
use yii\helpers\Html;
//use yii\bootstrap5\Button;
use yii\helpers\Url;
//use yii\helpers\ArrayHelper;
$this->title = Yii::t('app','Authorization');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="Authorization-default-index">
    <h1><?= $this->title ?></h1>
    <div class="row">
        <div class="col-sm-3 d-grid gap-2">
            <h2>Approvals</h2>
            <?= Html::a('Approval Control', Url::to(['approvalcontrol/index']), ['class' => 'btn btn-danger btn-block']) ?>
            <?= Html::a('Approval Types', Url::to(['approvaltypes/index']), ['class' => 'btn btn-danger btn-block']) ?>
        </div>
        <div class="col-sm-3 d-grid gap-2">
            <h2>System Admin</h2>
        </div>
        <div class="col-sm-3">
            <!--<h2>Head-3</h2>-->
        </div>
        <div class="col-sm-3">
            <!--<h2>Head-4</h2>-->
        </div>
    </div>
</div>
