<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Constituency $model */

$this->title = Yii::t('app', 'Edit Constituency: {name}', [
    'name' => $model->constituencyName,
]);
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Constituency'), 'url' => ['index']];

$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="constituency-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
