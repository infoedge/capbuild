<?php

use yii\helpers\Html;

use backend\modules\settings\assets\ChurchAssets;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Parish $model */

$this->title = Yii::t('app', 'Edit Parish: {name}', [
    'name' => $model->parishName,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Parish'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
ChurchAssets::register($this);
?>
<div class="parish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
