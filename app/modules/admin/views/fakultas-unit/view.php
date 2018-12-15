<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FakultasUnit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>

<div class="box">
    <div class="fakultas-unit-view bod-body">
        <h3><?= Html::encode($this->title) ?></h3>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?> &nbsp &nbsp
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nama',
                'is_active',
            ],
        ])
        ?>
    </div>
</div>