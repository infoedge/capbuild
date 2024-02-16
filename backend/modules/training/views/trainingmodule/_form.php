<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingmodule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trainingmodule-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-4"><?= $form->field($model, 'moduleName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-6"><?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?></div>

    <div class="form-group">
        <br> <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
