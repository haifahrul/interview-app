<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCalon */

$this->title = Yii::t('app', 'Tambah User Calon');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Calon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="user-calon-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUploadCv' => $modelUploadCv,
    ]) ?>

</div>
