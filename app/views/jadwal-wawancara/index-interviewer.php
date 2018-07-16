<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\messages\Text;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\JadwalWawancaraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Jadwal Wawancara');
//$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'List' . $this->title;

?>
<div class="box">
    <div class="box-body">
        <div class="jadwal-wawancara-index">
            <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
            <p>
            <h3>Jadwal Wawancara</h3>
            <div class="pull-right">
                <?=
                \app\widgets\PageSize::widget([
                    'id' => 'select_page'
                ]);

                ?>
            </div>
            </p>
            <div class="clearfix"></div>
            <div class="table-responsive">
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
                    'tableOptions' => ['class' => 'table table-bordered table-condensed table-hover'],
                    'layout' => '{summary}{items}<div class="text-center">{pager}</div>',
                    'pager' => [
                        'options' => ['class' => 'pagination'], // set clas name used in ui list of pagination
                        'prevPageLabel' => Yii::t('app', 'Previous'), // Set the label for the "previous" page button
                        'nextPageLabel' => Yii::t('app', 'Next'), // Set the label for the "next" page button
                        'firstPageLabel' => Yii::t('app', 'First'), // Set the label for the "first" page button
                        'lastPageLabel' => Yii::t('app', 'Last'), // Set the label for the "last" page button
                        'nextPageCssClass' => 'next', // Set CSS class for the "next" page button
                        'prevPageCssClass' => 'prev', // Set CSS class for the "previous" page button
                        'firstPageCssClass' => 'first', // Set CSS class for the "first" page button
                        'lastPageCssClass' => 'last', // Set CSS class for the "last" page button
                        'maxButtonCount' => 10, // Set maximum number of page buttons that can be displayed
                    ],
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                            'header' => 'No',
                            'contentOptions' => ['class' => 'text-center'],
                        ],
                        // 'id',
                        'tanggal:date',
                        [
                            'attribute' => 'user_calon_id',
                            'value' => function($data) {
                                return $data['userCalon']['nama_calon'] . ', Phone: ' . $data['userCalon']['phone'];
                            }
                        ],
                        [
                            'attribute' => 'user_interviewer_id',
                            'value' => function($data) {
                                return $data['userInterviewer']['nama_pewawancara'];
                            }
                        ],
                        // 'status',
                        // 'timestamp',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'contentOptions' => ['style' => 'width:160px;', 'class' => 'text-center'],
                            'template' => '{view} &nbsp {interview}',
                            'header' => Yii::t('app', 'Options'),
                            'buttons' => [
                                'view' => function ($url, $model) {
                                    $icon = '<span class="btn btn-xs btn-default"><i class="fa fa-search-plus"></i></span>';
                                    $url = ['/jadwal-wawancara/view', 'id' => $model['id']];

                                    return Html::a($icon, $url, [
                                            'title' => Yii::t('app', 'View'),
                                            'url' => $url,
                                            'id' => 'btn-view',
                                            'data-pjax' => 0,
//                            'data-toggle' => 'modal',
//                            'data-target' => '#modal-view',
                                    ]);
                                },
                                'interview' => function ($url, $model) {
                                    $icon = '<span class="btn btn-xs btn-success"><i class="fa fa-arrow-circle-o-right"></i> Mulai Interview</span>';
                                    $url = ['/mulai-interview/create', 'id' => $model['id']];

                                    return Html::a($icon, $url, [
                                            'title' => Yii::t('app', 'Mulai Interview'),
                                            'url' => $url,
                                            'id' => 'btn-view',
                                            'data-pjax' => 0,
//                            'data-toggle' => 'modal',
//                            'data-target' => '#modal-view',
                                    ]);
                                },
                            ]
                        ],
                    ],
                ]);

                ?>
                <?php Pjax::end() ?>
            </div>
        </div>
    </div>
</div>