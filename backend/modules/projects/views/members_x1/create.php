<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\projects\models\Members $model */

$this->title = Yii::t('app', 'Add Member');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Switchboard'), 'url' => ['/settings/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Member List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="members-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
