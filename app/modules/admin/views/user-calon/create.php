<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCalon */

$this->title = Yii::t('app', 'Tambah Data Pelamar');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pelamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="user-calon-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUploadCv' => $modelUploadCv,
    ]) ?>

</div>
