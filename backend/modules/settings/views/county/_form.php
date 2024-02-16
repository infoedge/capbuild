<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\County $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="county-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'countyName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
