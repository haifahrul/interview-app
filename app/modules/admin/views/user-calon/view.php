<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\KeputusanTipe;
use app\widgets\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\UserCalon */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pelamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>

<div class="box">
    <div class="user-calon-view box-body">

        <h3><?= Html::encode('Detail Data Pelamar') ?></h3>
        <p>
            <?php
            if (Helper::checkRoute('update')) {
                echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
            }
            ?>
            &nbsp &nbsp
            <?php
            if (Helper::checkRoute('delete')) {
                echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]);
            }
            ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
                // 'user_id',
                'nama_calon',
                'usia',
                'pendidikan:ntext',
                [
                    'attribute' => 'jabatan_yang_dilamar',
                    'value' => $model['jabatan']['nama']
                ],
                'phone',
                'email:email',
                [
                    'attribute' => 'keputusan_id',
                    'value' => $model['keputusan']['nama']
                ],
                [
                    'attribute' => 'cv',
                    'format' => 'raw',
                    'value' => !empty($model->cv) ?
                            Html::a('Download', [Yii::$app->params['uploadUrl'] . 'cv/' . $model->cv], ['target' => '_blank']) : 'File tidak tersedia'
                ]
            ],
        ])
        ?>
    </div>
</div>