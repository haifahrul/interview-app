<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use app\components\EnumColumn;
use app\widgets\admin\models\User;
use kartik\grid\GridView;
use app\components\Buttons;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\widgets\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */

$this->title = Yii::t('app', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
$data = Yii::$app->db->createCommand('SELECT name FROM auth_item WHERE type=1')->queryAll();
$rolesItem = ArrayHelper::map($data, 'name', 'name');
$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
    'email:email',
    [
        'attribute' => 'roles',
        'format' => 'raw',
        'class' => EnumColumn::className(),
        'enum' => $rolesItem,
        'filter' => $rolesItem,
        'value' => function ($data) {
            $roles = [];
            foreach ($data->roles as $role) {
                $roles[] = $role->item_name;
            }
            return implode(', ', $roles);
        }
    ],
    [
        'attribute' => 'status',
        'format' => 'raw',
        'class' => EnumColumn::className(),
        'enum' => User::getStatus(),
        'options' => ['width' => '80px'],
        'value' => function ($data) {
            if ($data['status'] == 10)
                return "<span class='label label-primary'>" . 'Active' . "</span>";
            else
                return "<span class='label label-danger'>" . 'Banned' . "</span>";
        }
    ],
    [
        'attribute' => 'created_at',
        'value' => function($data) {
            return Yii::$app->formatter->asDate($data['created_at']);
        },
        'filter' => '',
//        'filterType' => GridView::FILTER_DATE,
//        'filterWidgetOptions' => [
//            'pluginOptions' => [
//                'format' => 'dd-M-yyyy',
//                'autoWidget' => true,
//                'autoclose' => true,
//                'todayHighlight' => true
//            ]
//        ],
    ],
    [
        'attribute' => 'updated_at',
        'value' => function($data) {
            return Yii::$app->formatter->asDate($data['updated_at']);
        },
        'filter' => '',
//        'filterType' => GridView::FILTER_DATE,
//        'filterWidgetOptions' => [
//            'pluginOptions' => [
//                'format' => 'dd-M-yyyy',
//                'autoWidget' => true,
//                'autoclose' => true,
//                'todayHighlight' => true
//            ]
//        ],
    ],
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'header' => Yii::t('app', 'Options'),
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}',
    'buttons' => [
        'view' => function ($url, $model) {
            $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-search-plus"></i></span>';
            $url = ['view', 'id' => $model['id']];

            return Html::a($icon, $url, [
                        'title' => Yii::t('app', 'View'),
                        'url' => $url,
//                        'id' => 'btn-view',
                        'data-pjax' => 0,
//                            'data-toggle' => 'modal',
//                            'data-target' => '#modal-view',
            ]);
        },
    ]
];
?>
<div class="pull-right">
    <?= \app\widgets\PageSize::widget(['id' => 'select_page']); ?>
</div>
<p></p>
<div class="assignment-index">        
    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterSelector' => 'select[name="per-page"]',
        'pager' => Buttons::pager(),
        'layout' => '{summary}{items}<div class="text-center">{pager}</div>',
        'responsive' => true,
        'responsiveWrap' => false,
        'hover' => true,
        'bordered' => false,
        'striped' => false,
        'columns' => $columns,
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
