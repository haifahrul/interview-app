<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\messages\text;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LogErrorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Log Errors');
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'List' . $this->title;

?>
<div class="box">
    <div class="box-header">
        <?=
            Html::a(Yii::t('app', 'Clear Log Error'), ['clear-log-error'], [
                'class' => 'btn btn-danger btn-sm',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to clear log error?'),
                    'method' => 'post',
                ],
            ])

            ?>
    </div>
    <?php Pjax::begin(['id' => 'grid']) ?>
    <?=
    GridView::widget([
        'id' => 'gridView',
        'emptyText' => Yii::t('app', 'Data tidak ditemukan'),
        //'summary'=>'',
        //'showFooter'=>true,
        //'filterPosition'=>'', // bisa header, footer or body
        'filterSelector' => 'select[name="per-page"]',
        'showHeader' => true,
        'showOnEmpty' => true,
        'emptyCell' => '',
        'layout' => '<div id="box-header-fixed">
    <div class="box-header with-border">
        ' . '<b>Log Error</b>' . '
        <div class="top10 box-tools">
            <div class="page-size">' . \app\widgets\PageSize::widget(['id' => 'select_page']) . '</div>
            <div class="pagination-summary hidden-xs">{summary}</div> <span class="">{pager}</span>
        </div>
    </div>
</div>
<div class="box-body padding-table-4">
    <div class="table-responsive"> {items} </div>
</div>
<div class="visible-xs text-center"><div class="pagination-summary">{summary}</div></div>',
        'summary' => '<b>{begin} - {end} of {totalCount}</b>',
        'pager' => [
            'prevPageLabel' => '<i class="fa fa-angle-left"></i>',
            'nextPageLabel' => '<i class="fa fa-angle-right"></i>',
            'maxButtonCount' => 0
        ],
        'tableOptions' => ['class' => 'table table-condensed table-hover'],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn',
                'name' => 'select'
            ],
            ['class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'contentOptions' => ['class' => 'text-center'],
            ],
            'id',
            [
                'attribute' => 'message',
                'value' => function($data) {
                    return $data['message'];
                }
            ],
            [
                'attribute' => 'data_json',
                'value' => function($data) {
                    return $data['data_json'];
                }
            ],
            'date_error',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width:90px;', 'class' => 'text-center'],
                'template' => '{view} {update} {delete}',
                'header' => Yii::t('app', 'Options'),
                'buttons' => [
                    'view' => function ($url, $model) {
                        $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-search-plus"></i></span>';
                        $url = ['view', 'id' => $model['id']];

                        return Html::a($icon, $url, [
                                'title' => Yii::t('app', 'View'),
                                'url' => $url,
                                'id' => 'btn-view',
                                'data-pjax' => 0,
//                            'data-toggle' => 'modal',
//                            'data-target' => '#modal-view',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></span>';
                        $url = ['update', 'id' => $model['id']];

                        return Html::a($icon, $url, [
                                'title' => Yii::t('app', 'Update'),
                                'url' => $url,
                                'id' => 'btn-update',
                                'data-pjax' => 0,
                        ]);
                    },
                    'delete' => function($url, $model) {
                        $icon = '<span class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></span>';
                        $url = ['delete', 'id' => $model['id']];

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
    ]);

    ?>
    <?php Pjax::end() ?>

</div>
</div>
<?php
$url = Url::to(['delete-items']);
$js = <<< JS
$(document).on("click","#btn-deletes", function() {
if(confirm("Apakah Anda yakin ingin menghapus item ini ?")){
var keys = $("#gridView").yiiGridView("getSelectedRows");
$.ajax({
type: "post",
url: '$url',
data: {keys},
success: function(data) {
$.pjax.reload({container:"#grid"});
},
});
return false;
};
});
$(document).on('click', '.btn-tambah',function(e){
var url = $(this).attr("href");
$("#modalform").modal("show")
.find("#modalContent")
.load( url);
$('.modal-title').text("judul modal ");
e.preventDefault();
});
;
JS;
$this->registerJs($js);

?>
<?php
// Modal::begin([
//   //'size'=> 'modal-lg',
//   'id' => 'modalform',
//   'options'=>['class'=> 'modal fade'],
//   'header' => '<h4 class="text-center modal-title">Create</h4>',]);
// echo '<div id="modalContent"></div>';
// Modal::end();

?>

