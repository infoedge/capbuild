<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Towns $model */

$this->title = Yii::t('app', 'Add Town');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Towns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="towns-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
