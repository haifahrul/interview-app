<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AspekPenilaian */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Aspek Penilaian',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aspek Penilaians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="aspek-penilaian-update">

    <h1><?php //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
