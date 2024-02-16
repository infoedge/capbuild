<?php
use yii\helpers\Html;
use yii\helpers\Url;
/** @var yii\web\View $this */
$this->title = Yii::t('app', 'Dashboard');
?>
<div>
    <div class="row">
        <div class="col-sm-12 text-center">

            <h1><?= $this->title ?></h1>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-3">

            <h2>Member Particulars</h2>
            <table class="table table-striped"  >
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td><?= $theMember->membersFullName ?></td>
                    </tr>
                    <tr>
                        <td>No:</td>
                        <td><?= $theMember->id ?></td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td><?= $theMember->email ?></td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td><?= $theMember->phone ?></td>
                    </tr>
                    <tr>
                        <td>Church:</td>
                        <td><?= $theMember->church ?></td>
                    </tr>
                    <tr>
                        <td>Roles:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-md-3">
            
        </div>
        <div class="col-md-3">
            
        </div>
        <div class="col-md-3 d-grid gap-2">
            <h2>Actions</h2>
            <?= Html::a(Yii::t('app', 'Add Project'), Url::to(['theproject/create']) , ['class'=>'btn btn-success btn-block btn-sm'])?><br><!-- comment -->
            <br>
        </div>
    </div><!-- end row -->   
</div>
