<?php

namespace app\widgets\touchpdf;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TouchPdfAsset
 *
 * @author haifa
 */
class TouchPdfAsset extends \yii\web\AssetBundle {

    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @bower alias used.   
    public $sourcePath = '@app/widgets/touchpdf';
    public $css = [
        'jquery.touchPDF.css',
    ];
    public $js = [
        'pdf.compatibility.js',
        'pdf.js',
        'jquery.min.js',
        'jquery.touchSwipe.js',
        'jquery.touchPDF.js',
        'jquery.panzoom.js',
        'jquery.mousewheel.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
