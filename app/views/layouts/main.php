<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $menuItems[] = ['label' => 'Apply Lamaran', 'url' => 'apply-lamaran'];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => 'login'];
            } else {
//                $menuItems = Yii::$app->menus->leftMenus();
                $menuItems[] = ['label' => '<li>'
                    . Html::beginForm(['logout'], 'post')
                    . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>', 'url' => 'logout'];
            }

//    $menuItems[] = [
//        Yii::$app->user->isGuest ? (
//                ['label' => 'Logout', 'url' => ['/site/logout', 'method' => 'POST']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//    ];   

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?php
                if (Yii::$app->session->hasFlash('success') || Yii::$app->session->hasFlash('warning') || Yii::$app->session->hasFlash('danger')):
                    echo app\widgets\toastr\ToastrFlash::widget([
                        'options' => [
                            "closeButton" => false,
                            "debug" => false,
                            "newestOnTop" => false,
                            "progressBar" => true,
                            "positionClass" => "toast-top-right",
                            "preventDuplicates" => false,
                            "onclick" => null,
                            "showDuration" => "300",
                            "hideDuration" => "1000",
                            "timeOut" => "10000",
                            "extendedTimeOut" => "1000",
                            "showEasing" => "swing",
                            "hideEasing" => "linear",
                            "showMethod" => "fadeIn",
                            "hideMethod" => "fadeOut"
                        ]
                    ]);
                endif;
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-center">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>

                <!--<p class="pull-right"><?= Yii::powered() ?></p>-->
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
