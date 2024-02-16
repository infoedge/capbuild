<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;

use backend\modules\settings\models\Parish;
/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Localchurch $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="localchurch-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-4"><?= $form->field($model, 'parishId')->dropDownList(ArrayHelper::map(Parish::find()->all(),'id','parishName'),['prompt'=>'--Choose Local Church--']) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'churchName')->textInput(['maxlength' => true]) ?></div>

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
    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?>

        <?= $form->field($model, 'endDate')->hiddenInput()->label('') ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
