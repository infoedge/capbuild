<?php

use yii\helpers\Html;
use backend\modules\training\assets\TrainingAssets;
/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingunit $model */

$this->title = Yii::t('app', 'Edit Training Unit: {name}', [
    'name' => $model->trainingModule->moduleName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Trainingunits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Training Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Training Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
TrainingAssets::register($this);
?>
<div class="trainingunit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
