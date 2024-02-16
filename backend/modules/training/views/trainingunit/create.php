<?php

use yii\helpers\Html;
use backend\modules\training\assets\TrainingAssets;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingunit $model */

$this->title = Yii::t('app', 'Add Training Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Training Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Training Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

TrainingAssets::register($this);
?>
<div class="trainingunit-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>A Training Unit puts together several Course Units into one and gives it a shelf life defined by Start Date and End Date. </p>
        <p>End date may be empty, meaning that the Training Unit never expires.</p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
