<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\County

/** @var yii\web\View $this */
/** @var backend\modules\settings\models\Constituency $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="constituency-form">

<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">
<?= $form->field($model, 'countyNo')->dropDownList(ArrayHelper::map(County::find()->all(), 'id', 'countyName'), ['prompt' => '--Enter County Name --']) ?>
        </div>
        <div class="col-sm-6">
<?= $form->field($model, 'constituencyName')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="form-group">
<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
