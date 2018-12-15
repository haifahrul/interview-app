<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserInterviewer */

$this->title = Yii::t('app', 'Update Data Interviewer ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Interviewer'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-interviewer-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
    $this->render('_form', [
        'model' => $model,
        'modelUser' => $modelUser,
    ])
    ?>

</div>
