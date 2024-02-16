<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingmodule $model */

$this->title = Yii::t('app', 'Add Training Module');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Training Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Training Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingmodule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
