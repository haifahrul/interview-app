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

?>
<div class="box">
    <div class="box-header">
        <h1 style="text-decoration: underline;" class="text-center">HASIL WAWANCARA</h1>
    </div>
    <div class="formulir-form box-body">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Nama Pelamar</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->calon->nama_calon ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Usia</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->calon->usia . ' tahun' ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Pendidikan</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->calon->pendidikan ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Jabatan yang dilamar</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->calon->jabatan_yang_dilamar ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Nama Pewawancara</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->interviewer->nama_pewawancara ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Jabaran Pewawancara</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->interviewer->jabatan->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Fakultas/Unit</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo $model->interviewer->fakultasUnit->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-xs-12 col-md-4">Tanggal Wawancara</label>
                    <div class="col-xs-12 col-md-6">
                        <div class="form-control">
                            <?php echo Yii::$app->formatter->asDate($model->tanggal_wawancara) ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
        </div>

        <p>Berilah penilaian dengan mengisi pada kolom yang sesuai dengan kriteria penilaian</p>

        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center" colspan=""><h4><b>ASPEK PENILAIAN</b></h4></th>
                        <th class="text-center" rowspan="1" style="vertical-align: middle;"><h4><b>KRITERIA PENILAIAN</b></h4></th>
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
                                <th class="text-center">Ket. 1-2 Kurang, 3-5 Cukup, 6-7 Baik</th>
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
                                <div class="form-group field-formulirkompetensiposisi-aspek_penilaian">
                                    <label style="font-weight: normal" class="pull-left" for="formulirkompetensiposisi-aspek_penilaian"><?= $no ?>.</label>
                                    <div class="col-xs-11">
                                        <!-- <div class="form-control"> -->
                                        <?= $value['aspek_penilaian'] ?>
                                        <!-- </div> -->
                                        <div class="help-block help-block-error "></div>
                                    </div>

                                </div>
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
            <div class="col-xs-12 col-md-2"><b>Catatan dari interviewer mengenai calon :</b></div>
            <div class="col-xs-12 col-md-8">
                <p>
                    <?= Html::encode($model->catatan) ?>
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <p>
                    <b>Keputusan dari sistem</b>
                </p>
            </div>
            <div class="col-xs-12 col-md-2">
                <p>
                    <?= !empty($model->keputusan) ? $model->keputusan->nama : '-' ?>
                </p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-md-2">
                <p>
                    <b>Keputusan Interviewer</b>
                </p>
            </div>
            <div class="col-xs-12 col-md-2">
                <?php if (Yii::$app->user->can('Interviewer')) { ?>
                    <?php
                    $form = ActiveForm::begin([
                            'id' => 'keputusan-intervewer-form',
                            'options' => ['class' => 'form-horizontal'],
                        ])

                    ?>                    
                    <?= $form->field($model, 'keputusan_interviewer')->dropDownList(KeputusanTipe::getListData(), ['prompt' => ''])->label(false) ?>
                    <div class="form-group">
                        <div class="">
                            <?= Html::submitButton('Selesai & Simpan', ['class' => 'btn btn-primary btn-sm']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                <?php } else { ?>
                    <?= !empty($model->keputusan_interviewer) ? KeputusanTipe::getListData($model->keputusan_interviewer) : '-' ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <?= Html::a('<i class="glyphicon glyphicon-arrow-left glyphicon-xs"></i> ' . Yii::t('app', 'Kembali'), ['index'], ['class' => 'btn btn-default btn-md']) ?> &nbsp
        <?= Html::a('<i class="glyphicon glyphicon-print glyphicon-xs"></i> ' . Yii::t('app', 'Cetak'), ['cetak', 'id' => $model->id], ['class' => 'btn btn-success btn-md', 'target' => '_blank']) ?>
    </div>
</div>
