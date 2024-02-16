<?php

use yii\helpers\Html;
use backend\modules\settings\assets\ChurchAssets;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Localchurch $model */

$this->title = Yii::t('app', 'Add Local Church');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Add/Edit Local Church'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
ChurchAssets::register($this);
?>
<div class="localchurch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
