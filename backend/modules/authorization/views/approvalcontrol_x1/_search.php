<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\ApprovalcontrolSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="approvalcontrol-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tabName') ?>

    <?= $form->field($model, 'approvalType') ?>

    <?= $form->field($model, 'serialOrder') ?>

    <?= $form->field($model, 'beginDate') ?>

    <?php // echo $form->field($model, 'closeDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
