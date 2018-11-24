<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\widgets\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $model app\models\Formulir */

$this->title = 'Hasil Wawancara';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formulirs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;

?>

<div class="box">
    <div class="formulir-view box-body">
            <h1><?php echo Html::encode($this->title) ?></h1>
        <p>
        <?php 
            if(Helper::checkRoute('update')){
                echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']);
            }
            ?>
            &nbsp &nbsp
            <?php
            if(Helper::checkRoute('delete')){
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
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id',
            'calon.nama_calon',
            'interviewer.nama_pewawancara',
            'tanggal_wawancara:date',
            'catatan:ntext',
            'nilai',
            [
                'attribute' => 'keputusan_id',
                'value' => $model['keputusan']['nama']
            ]
            // 'timestamp',
            ],
        ]) ?>
    </div>
</div>