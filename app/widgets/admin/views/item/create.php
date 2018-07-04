<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\widgets\admin\models\AuthItem */
/* @var $context app\widgets\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('app', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <h4><?= Html::encode($this->title) ?></h4><hr>
    <?= $this->render('_form', ['model' => $model]); ?>
</div>
