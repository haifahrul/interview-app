<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserInterviewer */

$this->title = Yii::t('app', 'Tambah Data Interviewer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Interviewer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="user-interviewer-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
    ]) ?>

</div>
