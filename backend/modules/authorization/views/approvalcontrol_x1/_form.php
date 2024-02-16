<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\authorization\models\Approvaltypes;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Approvalcontrol $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="approvalcontrol-form">

    <?php $form = ActiveForm::begin(); ?>
<div class ="row">
    <div class="col-sm-2"><?= $form->field($model, 'tabName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'approvalType')->dropDownList(ArrayHelper::map(Approvaltypes::find()->all(),'id','typeName'),['prompt'=>'--Pick Approval Type--']) ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'serialOrder')->textInput() ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'beginDate')->textInput() ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'closeDate')->textInput() ?></div>

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
