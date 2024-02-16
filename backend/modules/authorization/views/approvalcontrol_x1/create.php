<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Approvalcontrol $model */

$this->title = Yii::t('app', 'Add Approval Controls');
$this->params['breadcrumbs'][] = ['label' => 'Admin Switchboard', 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Approval Controls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approvalcontrol-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php        print_r($model->allTabNames()); ?> 
    </p>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
