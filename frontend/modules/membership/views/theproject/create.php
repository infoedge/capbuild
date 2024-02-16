<?php

use yii\helpers\Html;
use frontend\modules\membership\assets\MyAssets;

/** @var yii\web\View $this */
/** @var frontend\modules\membership\models\Theproject $model */

MyAssets::register($this);


$this->title = Yii::t('app', 'Add Project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashboard'), 'url' => ['dashboard/index']];
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Theprojects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="theproject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
