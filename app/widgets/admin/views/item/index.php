<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\admin\components\RouteRule;
use app\components\Buttons;
use app\messages\Text;
use yii\bootstrap\Modal;
use app\widgets\admin\components\Helper;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\widgets\admin\models\searchs\AuthItem */
/* @var $context app\widgets\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('app', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <p>
        <?php
        if (Helper::checkRoute('create')) {
            echo Html::a('<i class="fa fa-plus"></i> <b>' . Yii::t('app', 'Create') . '</b>', ['create'], ['data-pjax' => true, 'class' => 'btn btn-default btn-sm', 'title' => Yii::t('app', 'Create'), 'id' => 'btn-create']);
        }
        ?>
    </p>
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'id' => 'gridView',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, 'filterSelector' => 'select[name="per-page"]',
        'tableOptions' => ['class' => 'table table-condensed table-hover'],
        'pager' => Buttons::pager(),
        'layout' => '{summary}<div class="table-responsive">{items}</div><div class="text-center">{pager}</div>',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('app', 'Name'),
            ],
            [
                'attribute' => 'ruleName',
                'label' => Yii::t('app', 'Rule Name'),
                'filter' => $rules
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('app', 'Description'),
            ],
            [
                'attribute' => 'data',
                'label' => Yii::t('app', 'Kode Penugasan'),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => Yii::t('app', 'Options'),
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                'buttons' => [
                    'view' => function ($url, $model) {
                        $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-search-plus"></i></span>';
                        $url = ['view', 'id' => $model->name];

                        return Html::a($icon, $url, [
                                    'title' => Yii::t('app', 'View'),
                                    'url' => $url,
//                                    'id' => 'btn-view',
                                    'data-pjax' => 0,
                        ]);
                    },
                    'update' => function ($url, $model) {
                        $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></span>';
                        $url = ['update', 'id' => $model->name];

                        return Html::a($icon, $url, [
                                    'title' => Yii::t('app', 'Update'),
                                    'url' => $url,
                                    'id' => 'btn-update',
                                    'data-pjax' => 0,
                        ]);
                    },
                    'delete' => function($url, $model) {
                        $icon = '<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span>';
                        $url = ['delete', 'id' => $model->name];

                        return Html::a($icon, $url, [
                                    'url' => $url,
                                    'title' => Yii::t('app', 'Delete'),
                                    'data' => [
                                        'confirm' => Text::CONFIRM_DELETE,
                                        'method' => 'post',
                                    ],
                                    'data-pjax' => 0,
                        ]);
                    }
                ]
            ],
        ],
    ])
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
//    'size'=> 'modal-lg',
    'id' => 'modal-form',
    'options' => ['class' => 'modal fade'],
    'header' => '<h4 class="text-center modal-title"></h4>',
//    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);
echo '<div id="modalContent"></div>';
Modal::end();
?>