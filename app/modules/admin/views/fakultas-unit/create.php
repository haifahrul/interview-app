<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FakultasUnit */

$this->title = Yii::t('app', 'Tambah Fakultas Unit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="fakultas-unit-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
