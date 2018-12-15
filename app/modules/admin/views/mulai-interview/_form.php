<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\Formulir */
/* @var $form yii\widgets\ActiveForm 
  author A. Fakhrurozi S.
 */
?>
<div class="box">
    <div class="box-header">
        <h1 style="text-decoration: underline;" class="text-center">FORMULIR WAWANCARA</h1>
    </div>
    <div class="formulir-form box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <label class="control-label col-sm-4">Nama Pelamar</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userCalon->nama_calon ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Usia</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userCalon->usia . ' tahun' ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Pendidikan</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userCalon->pendidikan ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Jabatan yang dilamar</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userCalon->jabatan_yang_dilamar ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <label class="control-label col-sm-4">Nama Pewawancara</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userInterviewer->nama_pewawancara ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Jabaran Pewawancara</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userInterviewer->jabatan->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Fakultas/Unit</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo $modelJadwal->userInterviewer->fakultasUnit->nama ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
                <div class="row">
                    <label class="control-label col-sm-4">Tanggal/Waktu Wawancara</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo Yii::$app->formatter->asDate($modelJadwal->tanggal) . ' / ' . Yii::$app->formatter->asTime($modelJadwal->waktu) ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
        </div>

        <p>Berilah penilaian dengan mengisi pada kolom yang sesuai dengan kriteria penilaian</p>

        <?php $form = ActiveForm::begin(['id' => 'form-interview']); ?>

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
                    $i = 0;
                    foreach ($modelAskepPenilaian as $key => $dataAspekPenilaian) {
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
                        foreach ($dataAspekPenilaian as $key2 => $value) {
                            $modelKriPen[$i] = $modelKriPen[0];
                            ?>
                            <tr>
                                <td><?= $no . '. ' . $value ?></td>
                                <td>
                                    <?= $form->field($modelKriPen[$i], "[{$i}]aspek_penilaian_id")->hiddenInput(['value' => $key2])->label(false) ?>
                                    <?=
                                    $form->field($modelKriPen[$i], "[{$i}]kriteria_penilaian")->dropDownList([
                                        1 => 1,
                                        2 => 2,
                                        3 => 3,
                                        4 => 4,
                                        5 => 5,
                                        6 => 6,
                                        7 => 7,
                                            ], ['prompt' => ''])->label(false)
                                    ?>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            $i++;
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
                    for ($a = 0; $a < 3; $a++) {
                        $modelKomPos[$a] = $modelKomPos[0];
                        ?>
                        <tr>
                            <td>
                                <label style="font-weight: normal" class="pull-left" for="formulirkompetensiposisi-aspek_penilaian"><?= $no ?>.</label>
                                <div class="col-sm-11">
                                    <?= $form->field($modelKomPos[$a], "[{$a}]aspek_penilaian")->textInput()->label(false) ?>
                                </div>
                            </td>
                            <td>
                                <?=
                                $form->field($modelKomPos[$a], "[{$a}]kriteria_penilaian")->dropDownList([
                                    1 => 1,
                                    2 => 2,
                                    3 => 3,
                                    4 => 4,
                                    5 => 5,
                                    6 => 6,
                                    7 => 7,
                                        ], ['prompt' => ''])->label(false)
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>

            <label class="control-label col-sm-3">Catatan dari interviewer mengenai calon : </label>
            <div class="col-sm-5">
                <?= $form->field($model, 'catatan')->textarea(['style' => 'height: auto', 'maxlength' => true, 'rows' => 5])->label(false) ?>
            </div>
        </div>

        <div class="form-group pull-right">
            <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk glyphicon-sm"> </i> Selesai & Simpan', ['class' => 'btn btn-primary btn-sm'])
            ?> &nbsp
            <?= Html::a('<i class="glyphicon glyphicon-remove glyphicon-sm"></i> ' . Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
