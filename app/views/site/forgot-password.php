<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Reset Password';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<div class="login-box">  
    <div class="text-center">
        <h3>Reset password</h3>
    </div>
    <hr>
    <?php if (!empty(Yii::$app->session['is-reset-password'])) { ?>
        <div class="login-box-body">
            <p>Reset password berhasil. Silahkan cek email Anda.</p>
            <p>Terima kasih</p>
        </div>
    <?php } else if (empty(Yii::$app->session['reset-password'])) { ?>
        <div class="login-box-body">        
            <!--<p class="login-box-msg">Sign in to start your session</p>-->

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

            <?=
                    $form
                    ->field($model, 'email', $fieldOptions1)
                    ->label(false)
                    ->textInput(['placeholder' => $model->getAttributeLabel('email')])
            ?>

            <div class="row">
                <!--            <div class="col-xs-8">
                            </div>-->
                <!-- /.col -->
                <div class="col-xs-12">
                    <?= Html::submitButton('<b>Reset</b>', ['class' => 'btn btn-default btn-block btn-flat', 'name' => 'login-button']) ?>
                </div>
                <!-- /.col -->
            </div>


            <?php ActiveForm::end(); ?>

            <!--        <div class="social-auth-links text-center">
                        <p>- OR -</p>
                        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in
                            using Facebook</a>
                        <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign
                            in using Google+</a>
                    </div>
                     /.social-auth-links 
            
                    <a href="#">I forgot my password</a><br>
                    <a href="register.html" class="text-center">Register a new membership</a>-->

        </div>
        <!-- /.login-box-body -->
    <?php } ?>
</div><!-- /.login-box -->
