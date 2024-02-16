<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\settings\models\Towns;

/** @var yii\web\View $this */
/** @var backend\modules\training\models\Trainingvenues $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trainingvenues-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    
    <div class="col-sm-3"><?= $form->field($model, 'town')->dropDownList(ArrayHelper::map(Towns::find()->orderBy('townName')->all(),'id','townName'),['prompt'=>'--Pick Venue--']) ?></div><!-- comment -->
    
    <div class="col-sm-3"><?= $form->field($model, 'venueName')->textInput(['maxlength' => true]) ?></div>

    <div class="col-sm-6"><?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?></div>

    

    <div class="form-group">
        <br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
