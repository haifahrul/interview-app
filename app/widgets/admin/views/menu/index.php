<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\Buttons;
use yii\bootstrap\Modal;
use app\messages\Text;
use yii\helpers\Url;
use app\widgets\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\widgets\admin\models\searchs\Menu */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    <div class="pull-right">
        <?= \app\widgets\PageSize::widget(['id' => 'select_page']); ?>
    </div>
    <p>
        <?= Buttons::create() ?>
    </p>

    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'id' => 'gridView',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => 'select[name="per-page"]',
        'tableOptions' => ['class' => 'table table-condensed table-hover'],
        'pager' => Buttons::pager(),
        'layout' => '{summary}<div class="table-responsive">{items}</div><div class="text-center">{pager}</div>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'menuParent.name',
                'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                    'class' => 'form-control', 'id' => null
                ]),
                'label' => Yii::t('app', 'Parent'),
            ],
            'route',
            'order',
            [
                'contentOptions' => ['class' => 'text-center'],
                'class' => 'yii\grid\ActionColumn',
                'header' => Yii::t('app', 'Options'),
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                'buttons' => Buttons::actionColumnButtons()
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>

<?php
$url = Url::to(['delete-items']);
$confirm = Text::CONFIRM_DELETE;
$notif = Text::NOTIF_DELETE;
$alert = Text::NOTIF_CHECK_ITEM;
$createTitle = Yii::t('app', 'Create');
$viewTitle = Yii::t('app', 'View');
$updateTitle = Yii::t('app', 'Update');
$js = <<< JS
        
    deleteItems("$url", "$confirm", "$notif", "$alert");
    btnModal("#btn-create", "$createTitle");
    btnModal("#btn-view", "$viewTitle");
    btnModal("#btn-update", "$updateTitle");
        
JS;
$this->registerJs($js);
?>

<?php
Modal::begin([
    //'size'=> 'modal-lg',
    'id' => 'modal-form',
    'options' => ['class' => 'modal fade'],
    'header' => '<h4 class="text-center modal-title"></h4>',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo '<div id="modalContent"></div>';
Modal::end();
?>
