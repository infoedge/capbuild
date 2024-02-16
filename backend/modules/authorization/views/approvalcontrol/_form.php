<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

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

    <div class="col-sm-2"><?= $form->field($model, 'mybegindate')->textInput() ?>
    <?= $form->field($model, 'beginDate')->hiddenInput()->label('') ?></div>
    <!--<?= '<label class="control-label" for="members-birthDate"> &nbsp Date of Birth </label>' ?>
            <?=
            $form->field($model, 'beginDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'birthDate',
                    //'class'=>'cust-form',
                    'aria-label' => 'Date of Birth',
                    'placeholder' => 'dd/mm/yyyy',
                ],
                'clientOptions' => [
                    'value' => null,
                    'autoClose' => true,
                    'dateFormat' => 'dd/mm/yy',
//                'changeYear' =>true,
//                'changeMonth'=>true,
                    'showButtonPanel' => true,
                //'showOn' => 'button',
                //'buttonImage' => 'images/calendar.png',
                //'buttonImageOnly' => true
                ]
            ])->label('')
            ?>-->

    <div class="col-sm-2"><?= $form->field($model, 'myclosedate')->textInput() ?>
    <?= $form->field($model, 'closeDate')->hiddenInput()->label('') ?></div>

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
