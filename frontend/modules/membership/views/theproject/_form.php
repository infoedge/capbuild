<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\settings\models\Wards;
use backend\modules\settings\models\County;
use backend\modules\settings\models\Constituency;

/** @var yii\web\View $this */
/** @var frontend\modules\membership\models\Theproject $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="theproject-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-9">
            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3><?= Yii::t('app', 'Physical Location of Project') ?></h3>
            <div class="row">
                <div class="col-md-3">
                    <?=
                    $form->field($model, 'mycounty')->dropDownList(ArrayHelper::map(County::find()->all(), 'id', 'countyName'),
                            ['prompt' => '-- Pick county --'])
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'myconstituency')->dropDownList(ArrayHelper::map(Constituency::find()->all(), 'id', 'constituencyName'), ['prompt' => '--Select Constituency--']) ?>
                </div>
                <div class="col-md-3">
                    <?=
                    $form->field($model, 'wardNo')->dropDownList(ArrayHelper::map(Wards::find()->all(), 'id', 'fullWardName'),
                            ['prompt' => '-- Pick Ward --'])
                    ?>
                </div>
                <div class="col-md-3 ">
                    <?= $form->field($model, 'sublocation')->textInput() ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 ">
                    <?= $form->field($model, 'lat')->textInput() ?>
                </div>
                <div class="col-md-3 ">
                    <?= $form->field($model, 'lng')->textInput() ?>
                </div>

                <div class="col-md-3 ">
<?= $form->field($model, 'road')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-3 ">
<?= $form->field($model, 'plot')->textInput(['maxlength' => true]) ?>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group gap-2">
<br><?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>
</div>  

<?php ActiveForm::end(); ?>

</div>
