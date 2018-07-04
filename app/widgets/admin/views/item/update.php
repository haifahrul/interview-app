<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\widgets\admin\models\AuthItem */
/* @var $context app\widgets\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('app', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="auth-item-update">
    <h4><?= Html::encode($this->title) ?></h4>
    <hr>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
