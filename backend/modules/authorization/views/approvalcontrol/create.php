<?php

use yii\helpers\Html;
use backend\modules\authorization\assets\AuthAssets;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Approvalcontrol $model */

$this->title = Yii::t('app', 'Add Approval Controls');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Authorization'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Approval Controls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
AuthAssets::register($this);
?>
<div class="approvalcontrol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
