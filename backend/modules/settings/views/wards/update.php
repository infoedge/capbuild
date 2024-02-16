<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Wards $model */

$this->title = Yii::t('app', 'Edit Ward: {name}', [
    'name' => $model->wardName,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Wards'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="wards-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
