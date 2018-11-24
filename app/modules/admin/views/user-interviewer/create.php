<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserInterviewer */

$this->title = Yii::t('app', 'Tambah User Interviewer');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Interviewer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="user-interviewer-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
    ]) ?>

</div>
