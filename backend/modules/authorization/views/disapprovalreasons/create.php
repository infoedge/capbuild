<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\authorization\models\Disapprovalreasons $model */

$this->title = Yii::t('app', 'Create Disapprovalreasons');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disapprovalreasons'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disapprovalreasons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
