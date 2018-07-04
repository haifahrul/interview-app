<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\Buttons;

/* @var $this yii\web\View */
/* @var $model app\widgets\admin\models\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">
    <p>
        <?= Buttons::update($model->id) ?>
        <?= Buttons::delete($model->id) ?>
    </p>
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menuParent.name:text:Parent',
            'name',
            'route',
            'order',
        ],
    ])
    ?>
</div>