<?php

use yii\helpers\Html;
use backend\modules\settings\assets\ChurchAssets;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Deanery $model */

$this->title = Yii::t('app', 'Add Deanery');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Deanery'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

ChurchAssets::register($this);
?>
<div class="deanery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
