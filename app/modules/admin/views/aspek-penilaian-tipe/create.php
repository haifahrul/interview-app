<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AspekPenilaianTipe */

$this->title = Yii::t('app', 'Tambah Aspek Penilaian Tipe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aspek Penilaian Tipe'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="aspek-penilaian-tipe-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
