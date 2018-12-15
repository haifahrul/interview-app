<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
?>

<div class="register-box">
    <div class="register-logo">
        <!--        <a href="../../index2.html"><b>Apply Lamaran</b></a>-->
        <h2><b>Apply Lamaran</b></h2>
    </div>

    <div class="register-box-body">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?=
        $form->field($model, 'nama_calon', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
        ])->textInput(['autofocus' => true])
        ?>
        <?=
        $form->field($model, 'tanggal_lahir', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
        ])->textInput(['type' => 'date'])
        ?>
        <?=
        $form->field($model, 'pendidikan', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='fa fa-mortar-board form-control-feedback'></span>"
        ])->textarea(['rows' => 6])
        ?>
        <?=
        $form->field($model, 'jabatan_yang_dilamar', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
        ])->dropDownList($jabatans, ['prompt' => 'Pilih jabatan yang dilamar'])->label('Bagian yang dilamar')
        ?>
        <?=
        $form->field($model, 'phone', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
        ])
        ?>
        <?=
        $form->field($model, 'email', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
        ])->textInput(['type' => 'email'])
        ?>

        <?= $form->field($modelUploadCv, 'fileCv')->fileInput(['maxlength' => true]) ?>
        <p>
            Note: File zip terdiri dari foto, surat lamaran, cv, dan fotocopy ijazah.
        </p>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>


        <!--        <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                        Google+</a>
                </div>-->

        <!--<a href="login" class="text-center">Login</a>-->
    </div>
    <!-- /.form-box -->
</div>