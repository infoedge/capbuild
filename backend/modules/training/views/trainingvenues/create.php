<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingvenues $model */

$this->title = Yii::t('app', 'Create Trainingvenues');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Training Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List Training Venues'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trainingvenues-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
