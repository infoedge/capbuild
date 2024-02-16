<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Coursemodules $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="coursemodules-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-3"><?= $form->field($model, 'moduleName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-6"><?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?></div>

    <div class="col-sm-3"><?= $form->field($model, 'duration')->textInput() ?></div>

    <div class="form-group">
        <br> <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <div>
    <?php ActiveForm::end(); ?>

</div>
