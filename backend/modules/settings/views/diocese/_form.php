<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use backend\modules\settings\models\Country;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Diocese $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diocese-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row gap-2">
    <div class="col-sm-2"><?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->all(),'id','name'),['prompt'=>'-- Choose Country --']) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'dioceseName')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-sm-2"><?= $form->field($model, 'mystartdate')->textInput() ?></div>
    <!--<div class="col-sm-2"><?= $form->field($model, 'startDate')->hiddenInput() ?></div>
     <?=
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
    <!--<div class="col-sm-2"><?= $form->field($model, 'endDate')->hiddenInput() ?></div>
     <?=
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
    <!--<?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'createDate')->textInput() ?>-->

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
