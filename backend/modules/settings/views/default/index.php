<?php

use yii\helpers\Html;
//use yii\bootstrap5\Button;
use yii\helpers\Url;
//use yii\helpers\ArrayHelper;
$this->title = Yii::t('app','Admin Switchboard');
?>
<div class="settings-default-index">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1><?= $this->title ?></h1>
        </div>
    </div>


    <div class="row">
        
        <div class="col-md-3 d-grid gap-2">
            <h3>Projects</h3>
            <?= Html::a('Members List', Url::to(['/projects/members/index']), ['class' => 'btn btn-warning btn-block']) ?>
            <?= Html::a('Projects List', Url::to(['/projects/theproject/index']), ['class' => 'btn btn-warning btn-block']) ?>
            <?= Html::a('Add/Edit Project Statuses', Url::to(['/projects/projectstatuses/index']), ['class' => 'btn btn-warning btn-block']) ?>
            <hr>
            <h3>Employees</h3>
            
            <?= Html::a('Mangage Employee Details', Url::to(['/employees/default/index']), ['class' => 'btn btn-info btn-block']) ?></br>
            
        </div><!-- comment -->
        <div class="col-md-3 d-grid gap-2">
            <h3>Authorization</h3>
            <?= Html::a('Authorization', Url::to(['/authorization/default/index']), ['class' => 'btn btn-danger btn-block']) ?>
            <hr>
            <h3>Training</h3>
            <?= Html::a('Training', Url::to(['/training/default/index']), ['class' => 'btn btn-success btn-block']) ?>
        </div><!-- comment -->
        
        <div class="col-md-3 d-grid gap-2">
            <h3>Church</h3>
            <?= Html::a('Add/Edit Diocese Details', Url::to(['diocese/index']), ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Add/Edit Deanery Details', Url::to(['deanery/index']), ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Add/Edit Parish Details', Url::to(['parish/index']), ['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Add/Edit Local Church Details', Url::to(['localchurch/index']), ['class' => 'btn btn-primary btn-block']) ?>
        </div><!-- comment -->
        <div class="col-md-3 d-grid gap-2">
            <h3>Location Lists</h3>

            <?= Html::a('Add/Edit ID Types', Url::to(['idtypes/index']), ['class' => 'btn btn-secondary btn-block']) ?>
            <?= Html::a('Add/Edit Country Details', Url::to(['country/index']), ['class' => 'btn btn-secondary btn-block']) ?>
            <?= Html::a('Add/Edit County Details', Url::to(['county/index']), ['class' => 'btn btn-secondary btn-block']) ?>
            <?= Html::a('Add/Edit Constituency Details', Url::to(['constituency/index']), ['class' => 'btn btn-secondary btn-block']) ?>
            <?= Html::a('Add/Edit Ward Details', Url::to(['wards/index']), ['class' => 'btn btn-secondary btn-block']) ?>
            <?= Html::a('Add/Edit Town Details', Url::to(['towns/index']), ['class' => 'btn btn-secondary btn-block']) ?>
        </div>
    </div>

</div>
