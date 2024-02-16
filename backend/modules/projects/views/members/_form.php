<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\membership\models\Idtypes;
use frontend\modules\membership\models\Country;
use backend\modules\settings\models\Diocese;
use backend\modules\settings\models\Deanery;
use backend\modules\settings\models\Parish;
use backend\modules\settings\models\Localchurch;
use yii\web\View;
use yii\widgets\Pjax;
use yii\jui\DatePicker;

$this->registerJs('$( "#members-mybirthdate" ).datepicker({ minDate: "-85Y", maxDate: "-18Y",changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#members-birthdate", altFormat: "yy-mm-dd" });', View::POS_READY)

/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Members $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="members-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php Pjax::begin(); ?>
    

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'otherNames')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'gender')->radioList(['M' => 'Male', 'F' => 'Female'], ['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">

            <?= $form->field($model, 'mybirthdate')->textInput()->label('Date of Birth') ?>
            <?= $form->field($model, 'birthDate')->hiddenInput()->label('') ?>

            <!--<?= '<label class="control-label" for="members-birthDate"> &nbsp Date of Birth </label>' ?>
            <?=
            $form->field($model, 'birthDate')->widget(DatePicker::className(), [
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
        </div>
    </div>
    
    <div class="row">

        <div class="col-md-4">
<?= $form->field($model, 'idNo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
<?= $form->field($model, 'idType')->dropDownList(ArrayHelper::map(Idtypes::find()->all(), 'id', 'typeName'), ['prompt' => '--Select ID Type --']) ?>
        </div>
        <div class="col-md-4">
<?= $form->field($model, 'nationality')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name'), ['prompt' => '-- Select National Of --']) ?>
        </div>
    </div>
    <br>
    <div class="row">

        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <br>
    <div class="row">
       <!-- <div class="col-md-3">
            <?= $form->field($model, 'mydiocese')->dropDownList(ArrayHelper::map(Diocese::find()->all(),'id','dioceseName'),['prompt'=>'--Choose Diocese--']) ?>
        </div>-->
        <div class="col-md-3">
            <?= $form->field($model, 'mydeanery')->dropDownList(ArrayHelper::map(Deanery::find()->all(),'id','deaneryName'),['prompt'=>'--Choose Deanery--']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'myparish')->dropDownList(ArrayHelper::map(Parish::find()->all(), 'id', 'parishName'), ['prompt' => '--Choose Parish --']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'localChurch')->dropDownList(ArrayHelper::map(Localchurch::find()->all(), 'id', 'churchName'), ['prompt' => '-- Choose Local Church --']) ?>
        </div>
    </div>
    

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
    <?php Pjax::end(); ?>
    <?php ActiveForm::end(); ?>

</div>
