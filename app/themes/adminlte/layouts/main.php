<?php

use yii\helpers\Html;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$detect = Yii::$app->detect;
// Check for any mobile device.
if ($detect->isMobile()) {
    $layout = 'sidebar-mini sidebar-mini-expand-feature';
    $mobile = true;
} else {
    $layout = 'layout-top-nav';
    $mobile = false;
}

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@app/themes/adminlte/dist');
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <link rel="shortcut icon" href="<?= Yii::$app->homeUrl ?>favicon.ico" />
        <link rel="icon" type="image/x-icon" href="<?= Yii::$app->homeUrl ?>favicon.ico" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            /* Paste this css to your style sheet file or under head tag */
            /* This only works with JavaScript, 
            if it's not present, don't show loader */
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(../../../images/pre-loader/images/loader-128x/Preloader_2.gif) center no-repeat #fff;
            }
        </style>
    </head>
    <body class="skin-blue fixed <?= $layout ?>" style="height: auto; min-height: 100%;">
        <?php //\edgardmessias\assets\nprogress\NProgressAsset::register($this);  ?>
        <!--<div class="loader"></div>-->
        <!--    <div class="se-pre-con"></div>-->
        <?php $this->beginBody() ?>   
        <?php
        // Check for any mobile device.
        if ($mobile) {

            ?>
            <!-- mobile content -->
            <div class="wrapper" style="height: auto; min-height: 100%;">
                <?= $this->render('header.php', ['directoryAsset' => $directoryAsset]) ?>
                <?= $this->render('left.php', ['directoryAsset' => $directoryAsset]) ?>
                <?= $this->render('content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>
            </div>                 
        <?php } else { ?>
            <!-- other content for desktop -->
            <div class="wrapper" style="height: auto; min-height: 100%;">
                <?= $this->render('header-desktop.php', ['directoryAsset' => $directoryAsset]) ?>
                <?= $this->render('content-desktop.php', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>
            </div>
        <?php } ?>
        <?= $this->render('footer') ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<?php //}  ?>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>-->