<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\employees\models\Staffcv $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staffcv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'memberId')->textInput() ?>

    <?= $form->field($model, 'staffAttribId')->textInput() ?>

    <?= $form->field($model, 'attained')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'whereObtained')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fromDate')->textInput() ?>

    <?= $form->field($model, 'toDate')->textInput() ?>

    <?= $form->field($model, 'entryBy')->textInput() ?>

    <?= $form->field($model, 'testimonialCopy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entryDate')->textInput() ?>

    <?= $form->field($model, 'updatedBy')->textInput() ?>

    <?= $form->field($model, 'updatedDate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
