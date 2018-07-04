<?php

namespace app\themes\adminlte\assets;

use yii\web\AssetBundle;

/**
 * @author haifahrul haifahrul@gmail.com>
 * @since 2.0
 */
class iCheckAsset extends AssetBundle {

    public $sourcePath = '@app/themes/adminlte/plugins/iCheck';
    public $css = ['all.css'];
    public $js = ['icheck.min.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
