<?php

namespace frontend\modules\membership\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MyAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/registered.js',
        'js/divinematters.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
