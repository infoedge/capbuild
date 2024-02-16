<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Approvalcontrol $model */

$this->title = Yii::t('app', 'Edit Approval Control: {name}', [
    'name' => $model->approvalType,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Authorization'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Approval Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="approvalcontrol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
