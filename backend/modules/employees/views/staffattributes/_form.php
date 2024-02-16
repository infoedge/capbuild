<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\employees\models\Staffattributes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="staffattributes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'attribName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailRequired')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
