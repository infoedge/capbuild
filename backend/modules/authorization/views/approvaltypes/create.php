<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Approvaltypes $model */

$this->title = Yii::t('app', 'Add Approval Types');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Authorization', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Approval Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approvaltypes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
