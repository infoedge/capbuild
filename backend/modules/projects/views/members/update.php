<?php

use yii\helpers\Html;

use backend\modules\projects\assets\ProjectAssets;

/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Members $model */

$this->title = Yii::t('app', 'Edit Member: {name}', [
    'name' => $model->getMembersFullName(),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
ProjectAssets::register($this);
?>
<div class="members-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
