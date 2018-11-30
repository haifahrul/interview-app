<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\models\KeputusanTipe;

/* @var $model app\models\Formulir */
/* @var $form yii\widgets\ActiveForm 
  author A. Fakhrurozi S.
 */
$this->title = Yii::t('app', 'Detail Wawancara');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hasil Wawancara'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Detail Wawancara';

$script = '

body {
    font-size: 12px;
}

table > thead > tr > th > p {
    margin:0;
}

.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    line-height: 100%;
}

';
$this->registerCss($script)
?>
<div class="box">
    <div class="formulir-form box-body">
        <p style="text-decoration: underline; font-size: 16px; font-weight: bold" class="text-center">HASIL WAWANCARA</p>
        <div class="row">
            <div class="col-xs-6 col-md-6">
                <div class="row">
                    <label class="control-label col-xs-5 col-md-4">Nama Pelamar</label>
                    <div class="col-xs-7 col-md-6">
                        <div class="">
                            <?php echo $model->calon->nama_calon ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5 col-md-4">Usia</label>
                    <div class="col-xs-7 col-md-6">
                        <div class="">
                            <?php echo $model->calon->usia . ' tahun' ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5 col-md-4">Pendidikan</label>
                    <div class="col-xs-7 col-md-6">
                        <div class="">
                            <?php echo $model->calon->pendidikan ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5">Jabatan yang dilamar</label>
                    <div class="col-xs-7 col-md-6">
                        <div class="">
                            <?php echo $model->calon->jabatan_yang_dilamar ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-6">
                <div class="row">
                    <label class="control-label col-xs-5">Nama Pewawancara</label>
                    <div class="col-xs-7">
                        <div class="">
                            <?php echo $model->interviewer->nama_pewawancara ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5">Jabaran Pewawancara</label>
                    <div class="col-xs-7">
                        <div class="">
                            <?php echo $model->interviewer->jabatan->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5">Fakultas/Unit</label>
                    <div class="col-xs-7">
                        <div class="">
                            <?php echo $model->interviewer->fakultasUnit->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-5">Tanggal Wawancara</label>
                    <div class="col-xs-7">
                        <div class="">
                            <?php echo Yii::$app->formatter->asDate($model->tanggal_wawancara) ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
        </div>

        <p>Berilah penilaian dengan mengisi pada kolom yang sesuai dengan kriteria penilaian</p>

        <div class="table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" colspan=""><p><b>ASPEK PENILAIAN</b></p></th>
                        <th class="text-center" rowspan="1" style="vertical-align: middle;"><p><b>KRITERIA PENILAIAN</b></p></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $dataArray = 0;
                    foreach ($modelKriPen as $key => $dataAspekPenilaian) {
                        $no = 1;
                        if ($dataArray === 0) {
                            ?>
                            <tr>
                                <th colspan="1"><?= $key ?></th>
                                <th width="215px" class="text-center">Ket. 1-2 Kurang, 3-5 Cukup, 6-7 Baik</th>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr>
                                <th colspan="2"><?= $key ?></th>
                            </tr>
                            <?php
                        }
                        foreach ($dataAspekPenilaian as $k => $value) {
                            ?>
                            <tr>
                                <td><?= $no . '. ' . $k ?></td>
                                <td>
                                    <?= !empty($value) ? $value : '-' ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                        }
                        $dataArray++;
                    }
                    ?>
                </tbody>
                <thead>
                    <tr>
                        <td colspan="2">
                            <b>Kompetensi Posisi </b> (Harap user menuliskan beberapa kompetensi untuk posisi ini - bisa mengacu pada jon deskripsi)
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($modelKomPos as $value) {
                        if (empty($value['aspek_penilaian'])) {
                            continue;
                        }
                        ?>
                        <tr>
                            <td>
                                <?php // $form->field($modelKomPos, 'aspek_penilaian')->textInput()->label($no)    ?>
                                <!--<div class="form-group field-formulirkompetensiposisi-aspek_penilaian">-->
                                <!--<label style="font-weight: normal" class="pull-left" for="formulirkompetensiposisi-aspek_penilaian">.</label>-->
                                <!--<div class="col-xs-11">-->
                                <!-- <div class="form-control"> -->
                                <?= $no . '. ' . $value['aspek_penilaian'] ?>
                                <!-- </div> -->
                                <!--<div class="help-block help-block-error "></div>-->
                                <!--</div>-->

                                <!--</div>-->
                            </td>
                            <td>
                                <!-- <div class="form-control"> -->
                                <?= $value['kriteria_penilaian'] ?>
                                <!-- </div> -->
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <p>
                    <b>Catatan dari interviewer mengenai calon :</b> 
                    <?= Html::encode($model->catatan) ?>
                </p>
                <p>
                    <b>Keputusan dari sistem &nbsp &nbsp &nbsp : </b> <?= !empty($model->keputusan) ? $model->keputusan->nama : '-' ?>
                </p>
                <p>
                    <b>Keputusan Interviewer &nbsp &nbsp :</b>
                    <?= !empty($model->keputusan_interviewer) ? KeputusanTipe::getListData($model->keputusan_interviewer) : '-' ?>
                </p>
            </div>
            <div class="col-xs-6 pull-right">
                Tanggal, <?= Yii::$app->formatter->asDate($model->tanggal_wawancara) ?>
                <br><br><br><br>
                <h5><b>( <?= $model->interviewer->nama_pewawancara ?> )</b></h5>
            </div>
        </div>
    </div>
</div>


<?php
$script = <<<JS
    
    window.print();
    window.close();
    
JS;
$this->registerJs($script);
?>