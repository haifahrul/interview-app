<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AspekPenilaian */

$this->title = Yii::t('app', 'Tambah Aspek Penilaian');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aspek Penilaians'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="aspek-penilaian-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
