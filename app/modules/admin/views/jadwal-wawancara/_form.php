<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\UserCalon;
use app\models\UserPewawancara;
use app\models\UserInterviewer;

/* @var $model app\models\JadwalWawancara */
/* @var $form yii\widgets\ActiveForm 
	author A. Fakhrurozi S.
*/

?>
    <div class="box">
        <div class="jadwal-wawancara-form box-body">
            <?php $form = ActiveForm::begin([
            'options' => [
            'class' => 'form-horizontal'],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<div class=\"col-md-2\">{label}</div>\n<div class=\"col-md-7\">{input}{error}</div><div class=\"col-md-3\"></div>\n",
                'labelOptions' => ['class' => 'text-left1'],
            ],
                //'enableAjaxValidation' => true,
                //'validateOnBlur' => true
            
        ]); ?>

            <?= $form->field($model, 'tanggal')->textInput(['type' => 'date']) ?>
            <?= $form->field($model, 'user_calon_id')->dropDownList(UserCalon::getCalonList(), ['prompt' => '']) ?>
            <?= $form->field($model, 'user_interviewer_id')->dropDownList(['prompt' => '']) ?>

            <div class="col-md-2"></div>
            <div class="form-group">
                <?= Html::submitButton( '<i class="glyphicon glyphicon-floppy-disk glyphicon-sm"> </i>'.Yii::t('app', ' Simpan') , ['class' => 'btn btn-primary btn-sm']) ?> &nbsp &nbsp
                    <?= Html::a('<i class="glyphicon glyphicon-remove glyphicon-sm"></i> Cancel ', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-sm']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

<?php 
    $this->registerJs('getListInterviewer();');   
?>