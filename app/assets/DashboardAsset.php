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
class DashboardAsset extends AssetBundle {

//    public $basePath = '@webroot';
    public $baseUrl = '@publicUrl';
    public $js = [
        'js/dashboard/Chart.min.js',
        'js/dashboard/jquery.flot.min.js',
        'js/dashboard/jquery.flot.pie.js',
        'js/dashboard/dashboard.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
//        'app\assets\FlotChartAsset',
    ];

}
