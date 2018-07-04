<?php
/**
 * Created by PhpStorm.
 * User: haifa
 * Date: 04/05/2017
 * Time: 11.17
 */

use app\widgets\touchpdf\TouchPdfAsset;
use yii\helpers\Html;

TouchPdfAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>        -->
        <title><?= Html::encode($this->title) ?></title>
        <style>
            body, html {
                background-color: #404040;
                height: 100%;
                padding: 0;
                margin: 0;
            }
        </style>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </html>
<?php $this->endPage() ?>