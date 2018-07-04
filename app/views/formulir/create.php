<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Formulir */

$this->title = Yii::t('app', 'Tambah Formulir');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formulirs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="formulir-create">

    <h1><?php Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
