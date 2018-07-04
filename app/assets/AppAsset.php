<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author haifahrul <haifahrul@gmail.com>
 */
class AppAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@publicUrl';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/scrolltofixed-min.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\jui\JuiAsset',
        'app\assets\AdminLteAsset',
    ];

}
