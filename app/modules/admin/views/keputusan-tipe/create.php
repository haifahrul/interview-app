<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeputusanTipe */

$this->title = Yii::t('app', 'Tambah Keputusan Tipe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Keputusan Tipe'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="keputusan-tipe-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
