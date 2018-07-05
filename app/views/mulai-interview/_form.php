<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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
                    <label class="control-label col-sm-4">Nama Calon</label>
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
                    <label class="control-label col-sm-4">Tanggal Wawancara</label>
                    <div class="col-sm-6">
                        <div class="form-control">
                            <?php echo Yii::$app->formatter->asDate($modelJadwal->tanggal) ?>
                        </div>
                        <div class="help-block help-block-error"></div>
                    </div>
                </div>
            </div>
        </div>

        <p>Berilah penilaian dengan mengisi pada kolom yang sesuai dengan kriteria penilaian</p>

        <?php
        $form = ActiveForm::begin([
//                'options' => ['class' => 'form-horizontal'],
//                'layout' => 'horizontal',
//                'fieldConfig' => [
//                    'template' => "<div class=\"col-md-1\">{label}</div>\n<div class=\"col-md-5\">{input}{error}</div><div class=\"col-md-3\"></div>\n",
//                    'labelOptions' => ['class' => 'text-left1'],
//                ],
        ]);

        ?>    
        <?php // $form->field($model, 'keputusan_id')->textInput() ?>
        <?php // $form->field($modelJadwal, 'catatan')->textarea(['rows' => 6]) ?>

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
                        foreach ($dataAspekPenilaian as $value) {

                            ?>
                            <tr>
                                <td><?= $no . '. ' . $value ?></td>
                                <td>
                                    <select id="formulirkriteriapenilaian-kriteria_penilaian" class="form-control" name="FormulirKriteriaPenilaian[kriteria_penilaian]" aria-required="true" aria-invalid="true">
                                        <option value=""></option>
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">6</option>
                                        <option value="6">7</option>
                                    </select>
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
                    for ($a = 0; $a < 3; $a++) {

                        ?>
                        <tr>
                            <td>
                                <?php // $form->field($modelKomPos, 'aspek_penilaian')->textInput()->label($no)   ?>
                                <div class="form-group field-formulirkompetensiposisi-aspek_penilaian">
                                    <label style="font-weight: normal" class="pull-left" for="formulirkompetensiposisi-aspek_penilaian"><?= $no ?>.</label>
                                    <div class="col-sm-11">
                                        <input type="text" id="formulirkompetensiposisi-aspek_penilaian" class="form-control" name="FormulirKompetensiPosisi[aspek_penilaian]">
                                        <div class="help-block help-block-error "></div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <!--<div class="col-sm-12">-->
                                <select id="formulirkompetensiposisi-kriteria_penilaian" class="form-control" name="FormulirKompetensiPosisi[kriteria_penilaian]" aria-required="true" aria-invalid="true">
                                    <option value=""></option>
                                    <option value="0">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                    <option value="6">7</option>
                                </select>
                                <!--</div>-->
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
                <div class="">
                    <textarea id="formulirkompetensiposisi-aspek_penilaian" class="form-control" name="FormulirKompetensiPosisi[aspek_penilaian]"></textarea>
                    <div class="help-block help-block-error "></div>
                </div>
            </div>
        </div>

        <div class="form-group pull-right">
            <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk glyphicon-sm"> </i> Selesai & Simpan', ['class' => 'btn btn-primary btn-sm']) ?> &nbsp
            <?= Html::a('<i class="glyphicon glyphicon-remove glyphicon-sm"></i> ' . Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php
$script = <<<JS
$('body').on('beforeSubmit', 'form#{$model->formName()}', function () {
     var form = $(this);
         if (form.find('.has-error').length) {
              return false;
         }
         // submit form
         $.ajax({
              url: form.attr('action'),
              type: 'post',
              data: form.serialize(),
              success: function (response) {
                form.trigger("reset");
                $.pjax.reload({container:'#grid'});
                
              }
         });
   
     return false;
});
JS;
//$this->registerJs($script);

?>