<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\membership\models\Members $model */

use frontend\modules\membership\assets\MyAssets;


$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Membership'), 'url' => ['dashboard/index']];
$this->params['breadcrumbs'][] = $this->title;

MyAssets::register($this);
?>
<div class="registration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
