<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\UserCalon;
use app\widgets\admin\components\Helper;
use app\components\Buttons;

/* @var $this yii\web\View */
/* @var $model app\models\JadwalWawancara */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jadwal Wawancara'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>

<div class="box">
    <div class="jadwal-wawancara-view box-body">
        <h1>
            <?php echo Html::encode('Jadwal Wawancara') ?>
        </h1>
        <p>
            <?php
            if (Yii::$app->user->can('Interviewer')) {
                echo Html::a('<span class="fa fa-arrow-left"></span>', ['/admin/site/index'], ['class' => 'btn btn-default btn-sm', 'title' => Yii::t('app', 'Back')]);
            } else {
                echo Buttons::goToIndex();
            }
            ?>
            &nbsp &nbsp
            <?php
            if (Yii::$app->user->can('Interviewer')) {
                echo Html::a('<span class="fa fa-arrow-circle-o-right"></span> Mulai Interview', ['/admin/mulai-interview/create', 'id' => $model->id], ['class' => 'btn btn-success btn-sm', 'title' => Yii::t('app', 'Mulai Interview')]);
                echo '&nbsp &nbsp';
            }
            ?> 
            <?php
            if (Helper::checkRoute('delete')) {
                echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
            }
            ?>
            <?php
            if (Helper::checkRoute('delete')) {
                Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </p>
        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                'tanggal:date',
                'waktu:time',
                'userInterviewer.nama_pewawancara',
                [
                    'attribute' => 'status',
                    'value' => UserCalon::getStatus($model['status'])
                ]
            // 'timestamp',
            ],
        ])
        ?>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <p>
            <b>Data Calon</b>
        </p>
    </div>
    <div class="box-body">
        <?php
        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
                'userCalon.nama_calon',
                [
                    'attribute' => 'userCalon.usia',
                    'value' => $model['userCalon']['usia'] . ' Tahun'
                ],
                'userCalon.pendidikan:ntext',
                'userCalon.jabatan_yang_dilamar',
                'userCalon.phone',
                'userCalon.email',
                [
                    'attribute' => 'userCalon.cv',
                    'format' => 'raw',
                    'value' => !empty($model['userCalon']['cv']) ?
                            Html::a('Download', [Yii::$app->params['uploadUrl'] . 'cv/' . $model['userCalon']['cv']], ['target' => '_blank']) : 'File tidak tersedia'
                ]
            ],
        ])
        ?>
    </div>
</div>