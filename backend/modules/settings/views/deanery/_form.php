<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;


use backend\modules\settings\models\Diocese;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Deanery $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deanery-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-4"><?= $form->field($model, 'dioceseId')->dropDownList(ArrayHelper::map(Diocese::find()->all(),'id','dioceseName'),['prompt'=>'--Choose Diocese--']) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'deaneryName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'mystartdate')->textInput() ?></div>
     <!--<?=
            $form->field($model, 'startDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'startDate',
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

    <div class="col-sm-2"><?= $form->field($model, 'myenddate')->textInput() ?></div>
    
    <!--<?=
            $form->field($model, 'endDate')->widget(DatePicker::className(), [
                'options' => [
                    'attribute' => 'endDate',
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
</div>
    <!--<?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createDate')->textInput() ?>-->

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?> 
        <div class="col-sm-2"><?= $form->field($model, 'endDate')->hiddenInput()->label('') ?></div>   
    </div>

    <?php ActiveForm::end(); ?>

</div>
