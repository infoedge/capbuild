<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\jui\DatePicker;
/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Projectstatuses $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerJs('$("#projectstatuses-mystartdate" ).datepicker({changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#projectstatuses-startdate", altFormat: "yy-mm-dd" });', View::POS_READY);
$this->registerJs('$("#projectstatuses-myenddate" ).datepicker({changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#projectstatuses-enddate", altFormat: "yy-mm-dd" });', View::POS_READY);
?>

<div class="projectstatuses-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col-md-1">
            <?= $form->field($model, 'ordering')->textInput() ?>
        </div>
        <div class="col-md-2">
             <?= $form->field($model, 'myStartDate')->textInput() ?>
            <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?>
            <!--<?=  $form->field($model,'myStartDate')->widget(DatePicker::className(),[
                'options' => [
                    'attribute'=>'startDate',
                    //'class'=>'cust-form',
                    'aria-label'=>'Date of Birth',
                    'placeholder'=>'dd/mm/yyyy',
                ],
            'clientOptions' => [
                'value' => null,
                'autoClose'=>true, 
                'dateFormat' => 'dd/mm/yy', 

                'showButtonPanel'=>true,
                //'showOn' => 'button',
                //'buttonImage' => 'images/calendar.png',
                //'buttonImageOnly' => true
                ]
            ])->label('') 
            ?>-->
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'myEndDate')->textInput() ?>
            <!--<?=  $form->field($model,'myEndDate')->widget(DatePicker::className(),[
                'options' => [
                    //'attribute'=>'endDate',
                    //'class'=>'cust-form',
                    //'aria-label'=>'Date of Birth',
                    //'placeholder'=>'dd/mm/yyyy',
                ],
            'clientOptions' => [
                'value' => null,
                'autoClose'=>true, 
                //'dateFormat' => 'dd/mm/yy', 

                //'showButtonPanel'=>true,
                //'showOn' => 'button',
                //'buttonImage' => 'images/calendar.png',
                //'buttonImageOnly' => true
                ]
            ])->label('') 
            ?>-->
            <?= $form->field($model, 'endDate')->hiddenInput() ?>
        </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
