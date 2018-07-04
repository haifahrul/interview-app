<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FakultasUnit */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fakultas Unit',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fakultas-unit-update">

    <h1><?php //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
