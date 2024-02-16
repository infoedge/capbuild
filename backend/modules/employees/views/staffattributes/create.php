<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\employees\models\Staffattributes $model */

$this->title = Yii::t('app', 'Create Staffattributes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staffattributes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staffattributes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
