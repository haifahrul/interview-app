<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCalon */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'User Calon',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Calon'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-calon-update">

    <h1><?php //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
