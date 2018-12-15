<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FakultasUnit */

$this->title = Yii::t('app', 'Update {modelClass} ', [
            'modelClass' => 'Fakultas Unit',
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fakultas Unit'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fakultas-unit-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
