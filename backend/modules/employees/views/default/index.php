<?php 
use yii\helpers\Html;
use yii\helpers\Url;
//use Yii;

$this->title = Yii::t('app','Mangage Employee Details');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Admin Switchboard'), 'url' => ['/settings/default/index']];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="employees-default-index">
    <h1><?= $this->title/*context->action->uniqueId*/ ?></h1>
    <div class="row">
        <div class="col-sm-3 d-grid gap-2">
            <?= Html::a('Staff Curriculum Vitae', Url::to(['staffcv/index']), ['class' => 'btn btn-info btn-block']) ?></br>
            <?= Html::a('Staff Attributes', Url::to(['staffattributes/index']), ['class' => 'btn btn-info btn-block']) ?></br>
        </div>
    </div>
</div>
