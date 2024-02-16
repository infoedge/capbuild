<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Sublocations $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="sublocations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'locationId')->textInput() ?>

    <?= $form->field($model, 'sublocationName')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
