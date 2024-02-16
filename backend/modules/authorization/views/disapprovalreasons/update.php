<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Disapprovalreasons $model */

$this->title = Yii::t('app', 'Update Disapprovalreasons: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disapprovalreasons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="disapprovalreasons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
