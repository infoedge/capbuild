<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use backend\modules\settings\models\Constituency;
use backend\modules\settings\models\County;

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Wards $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="wards-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'countyNo')->dropDownList(ArrayHelper::map(County::find()->all(), 'id', 'countyName'),['prompt'=>'-- Enter County Name --']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'constituencyNo')->dropDownList(ArrayHelper::map(Constituency::find()->all(), 'id', 'constituencyName'),['prompt'=>'-- Enter Constituency Name --']) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'wardName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
