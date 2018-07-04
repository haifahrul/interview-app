<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use app\components\Buttons;
use app\models\Applications;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="user-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
        <div class="col-md-6 col-xs-12">
            <?= $form->field($model, 'apps_id')->dropDownList(Applications::getAppLists(), ['prompt' => ''])->label('Company') ?>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model2, 'firstname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model2, 'lastname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model2, 'no_telp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-xs-12">            
            <?php if ($model->isNewRecord) { ?>
                <?= $form->field($model, 'new_password')->passwordInput() ?>
                <?= $form->field($model, 'repeat_password')->passwordInput() ?>            
            <?php } ?>                        

            <?php
            $model->isNewrecord ? $model->status = 1 : $model->status;
            echo $form->field($model, 'status')->radioList([
                1 => Yii::t('app', 'Active'),
                0 => Yii::t('app', 'Inactive'),
            ]);

            ?> 
            <?php
            echo $form->field($authAssignment, 'item_name')->widget(Select2::classname(), [
                'data' => $authItems,
                'options' => [
                    'placeholder' => 'Select role ...',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                    'multiple' => true,
                ],
            ])->label('Role');

            ?>       
        </div>      
    </div>    
    <div class="box-footer">
        <div class="form-group">
            <p>                                          
                <?= Buttons::submitButton() ?>
                <?= Buttons::cancel() ?>
            </p>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>