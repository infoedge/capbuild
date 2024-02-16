<?php
namespace backend\modules\settings\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ChurchAssets extends AssetBundle
{
    
    public $sourcePath = __DIR__;
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/churchmatters.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
