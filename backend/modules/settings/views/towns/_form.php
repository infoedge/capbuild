<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\settings\models\County;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Towns $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="towns-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <!--<div class="col-sm-3"><?= $form->field($model, 'countryId')->textInput() ?></div>-->

    <div class="col-sm-4"><?= $form->field($model, 'subcountryId')->dropDownList(ArrayHelper::map(County::find()->all(),'id','countyName'),['prompt'=>'--Choose County--']) ?></div>

    <div class="col-sm-4"><?= $form->field($model, 'townName')->textInput(['maxlength' => true]) ?></div>

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
