<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingmodule $model */

$this->title = Yii::t('app', 'Edit Training Module: {name}', [
    'name' => $model->moduleName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Training Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Training Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="trainingmodule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
