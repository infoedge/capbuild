<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\employees\models\Staffcv $model */

$this->title = Yii::t('app', 'Create Staffcv');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staffcvs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffcv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
