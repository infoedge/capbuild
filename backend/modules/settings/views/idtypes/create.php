<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\settings\models\Idtypes $model */

$this->title = 'Add ID Type';
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Add/Edit ID Tpes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="idtypes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
