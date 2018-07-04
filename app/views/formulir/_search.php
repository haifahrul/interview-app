<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\FormulirSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="formulir-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'calon_id') ?>

    <?= $form->field($model, 'interviewer_id') ?>

    <?= $form->field($model, 'tanggal_wawancara') ?>

    <?= $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'keputusan_id') ?>

    <?php // echo $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
