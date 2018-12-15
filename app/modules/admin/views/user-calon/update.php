<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCalon */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Pelamar',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Pelamar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-calon-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUploadCv' => $modelUploadCv,
    ]) ?>

</div>
