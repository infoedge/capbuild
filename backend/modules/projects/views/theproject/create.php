<?php

use yii\helpers\Html;
use backend\modules\projects\assets\ProjectAssets;

/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Theproject $model */

$this->title = Yii::t('app', 'Add Project');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Projects List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

ProjectAssets::register($this);
?>
<div class="theproject-create">
    <div class="row">
        <div class="col-sm-12 d-grid text-center">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
