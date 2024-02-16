<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\employees\models\StaffcvSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staffcv-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'memberId') ?>

    <?= $form->field($model, 'staffAttribId') ?>

    <?= $form->field($model, 'attained') ?>

    <?= $form->field($model, 'whereObtained') ?>

    <?php // echo $form->field($model, 'fromDate') ?>

    <?php // echo $form->field($model, 'toDate') ?>

    <?php // echo $form->field($model, 'entryBy') ?>

    <?php // echo $form->field($model, 'testimonialCopy') ?>

    <?php // echo $form->field($model, 'entryDate') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'updatedDate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
