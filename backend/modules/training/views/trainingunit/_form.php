<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use backend\modules\training\models\Trainingmodule;
use backend\modules\training\models\Coursemodules;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingunit $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trainingunit-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-4"><?= $form->field($model, 'trainingModuleId')->dropDownList(ArrayHelper::map(Trainingmodule::find()->all(),'id','moduleName'),['prompt'=>'--Pick Training Module--']) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'courseModuleId')->dropDownList(ArrayHelper::map(Coursemodules::find()->all(),'id','moduleName'),['prompt'=>'--Pick Course Module--']) ?></div>

    <div class="col-sm-2"><?= $form->field($model, 'mystartdate')->textInput() ?>
    <?= $form->field($model, 'startDate')->hiddenInput()->label('') ?></div>
    <!--<?= '<label class="control-label" for="members-birthDate"> &nbsp Date of Birth </label>' ?>
            <?=
            $form->field($model, 'startDate')->widget(DatePicker::className(), [
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

    <div class="col-sm-2"><?= $form->field($model, 'myenddate')->textInput() ?>
    <?= $form->field($model, 'endDate')->hiddenInput()->label('') ?></div>

    <!-- comment -->

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
