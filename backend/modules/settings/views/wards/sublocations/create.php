<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Sublocations $model */

$this->title = Yii::t('app', 'Create Sublocations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sublocations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sublocations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
