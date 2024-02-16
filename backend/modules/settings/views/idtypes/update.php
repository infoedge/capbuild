<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\settings\models\Idtypes $model */

$this->title = 'Edit ID Types: ' ;
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Add/ Edit ID Types', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="idtypes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
