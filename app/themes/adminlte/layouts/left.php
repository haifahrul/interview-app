<?php
use app\widgets\admin\components\MenuHelper;
use yii\bootstrap\Nav;
?>

<aside class="main-sidebar">
    <section class="sidebar">
        <?php /*
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->homeUrl ?>images/anonymous.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        */ ?>
        
        <?= app\widgets\adminlte\Menu::widget([ 
            'options' => ['class' => 'sidebar-menu'],
            'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id),
        ]); ?>
    </section>
</aside>
