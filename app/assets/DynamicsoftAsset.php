<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author haifahrul <haifahrul@gmail.com>
 * @since 2.0
 */

class DynamicsoftAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@publicUrl';
//    public $sourcePath = '@app/views/surat-masuk/Resources';
    
    public $css = [
        'Style/ds.demo.css',
//        'reference/hint.css',
//        'reference/html5_editor.css'        
    ];
    
    public $js = [
        'Resources/dynamsoft.webtwain.initiate.js',
        'Resources/dynamsoft.webtwain.config.js',
        'Resources/addon/dynamsoft.webtwain.addon.pdf.js',
//        'Scripts/script.js'
//        'dynamsoft.webtwain.initiate.js',
//        'dynamsoft.webtwain.config.js',
//        'addon/dynamsoft.webtwain.addon.pdf.js',
//        'Scripts/script.js'
    ];
    
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
//    ];
}