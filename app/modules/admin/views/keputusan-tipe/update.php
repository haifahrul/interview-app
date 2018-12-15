<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeputusanTipe */

$this->title = Yii::t('app', 'Update {modelClass} ', [
            'modelClass' => 'Keputusan Tipe',
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Keputusan Tipe'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="keputusan-tipe-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
