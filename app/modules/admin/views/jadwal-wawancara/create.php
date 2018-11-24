<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JadwalWawancara */

$this->title = Yii::t('app', 'Tambah Jadwal Wawancara');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jadwal Wawancaras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="jadwal-wawancara-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
