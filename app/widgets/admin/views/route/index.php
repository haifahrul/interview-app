<?php

use yii\helpers\Html;
use yii\helpers\Json;
use app\widgets\admin\AnimateAsset;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $routes [] */

$this->title = Yii::t('app', 'Routes');
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
            'routes' => $routes
        ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<!--<h1><?= Html::encode($this->title) ?></h1>-->
<div class="row">
    <div class="col-sm-11">
        <div class="input-group">
            <input id="inp-route" type="text" class="form-control"
                   placeholder="<?= Yii::t('app', 'New route(s)') ?>">
            <span class="input-group-btn">
                <?=
                Html::a('<b>' . Yii::t('app', 'Add') . $animateIcon . '</b>', ['create'], [
                    'class' => 'btn btn-default btn-sm',
                    'id' => 'btn-new'
                ])
                ?>
            </span>
        </div>
    </div>
</div>
<p>&nbsp;</p>
<div class="row">
    <div class="col-sm-5">
        <div class="input-group">
            <input class="form-control search" data-target="avaliable"
                   placeholder="<?= Yii::t('app', 'Search for avaliable') ?>">
            <span class="input-group-btn">
                <?=
                Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['refresh'], [
                    'class' => 'btn btn-default btn-xs',
                    'id' => 'btn-refresh',
                    'title' => Yii::t('app', 'Refresh'),
                ])
                ?>
            </span>
        </div>
        <select multiple size="20" class="form-control list" data-target="avaliable"></select>
    </div>
    <div class="col-sm-1">
        <br><br>
        <?=
        Html::a('&gt;&gt;' . $animateIcon, ['assign'], [
            'class' => 'btn btn-success btn-assign',
            'data-target' => 'avaliable',
            'title' => Yii::t('app', 'Assign')
        ])
        ?><br><br>
        <?=
        Html::a('&lt;&lt;' . $animateIcon, ['remove'], [
            'class' => 'btn btn-danger btn-assign',
            'data-target' => 'assigned',
            'title' => Yii::t('app', 'Remove')
        ])
        ?>
    </div>
    <div class="col-sm-5">
        <input class="form-control search" data-target="assigned"
               placeholder="<?= Yii::t('app', 'Search for assigned') ?>">
        <select multiple size="20" class="form-control list" data-target="assigned"></select>
    </div>
</div>
