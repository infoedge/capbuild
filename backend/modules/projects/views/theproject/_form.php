<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\projects\models\Members;
use backend\modules\projects\models\County;
use backend\modules\projects\models\Constituency;
use backend\modules\projects\models\Wards;
use backend\modules\projects\models\Sublocations;

/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Theproject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="theproject-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-sm-3"><?= $form->field($model, 'memberId')->dropDownList(ArrayHelper::map(Members::find()->all(),'id','fullMemberName'),['prompt'=>'--Choose Member --']) ?></div>

    <div class="col-sm-3"><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-6"><?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?></div>
</div>
    <br>
<div class="row">
    <div class="col-sm-12 d-grid text-center">
        <h3 class="">Physical Location of the Project</h3>
    </div>
    <div class="row">
    <div class="col-sm-3"><?= $form->field($model, 'mycounty')->dropDownList(ArrayHelper::map(County::find()->all(),'id','countyName'),['prompt'=>'--Choose County--']) ?></div>

    <div class="col-sm-3"><?= $form->field($model, 'myconstituency')->dropDownList(ArrayHelper::map(Constituency::find()->all(),'id','constituencyName'),['prompt'=>'--Choose Constituency--']) ?></div>

    <div class="col-sm-3"><?= $form->field($model, 'wardNo')->dropDownList(ArrayHelper::map(Wards::find()->all(),'id','wardName'),['prompt'=>'--Choose Ward--']) ?></div>
       
    <div class="col-sm-3"><?= $form->field($model, 'sublocation')->dropDownList(ArrayHelper::map(Sublocations::find()->all(),'id','sublocationName'),['prompt'=>'--Choose Sublocation--']) ?></div>

 </div>
<div class="row">
    <div class="col-sm-3"><?= $form->field($model, 'road')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-sm-3"><?= $form->field($model, 'plot')->textInput(['maxlength' => true]) ?></div>
    
    <div class="col-sm-3"><?= $form->field($model, 'lat')->textInput() ?></div>

    <div class="col-sm-3"><?= $form->field($model, 'lng')->textInput() ?></div>
    
</div>
    
    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
