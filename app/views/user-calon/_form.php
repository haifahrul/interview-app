<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\KeputusanTipe;
use app\models\UserCalon;

/* @var $model app\models\UserCalon */
/* @var $form yii\widgets\ActiveForm 
	author A. Fakhrurozi S.
*/

?>
<div class="box">
    <div class="user-calon-form box-body">
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data'
            ],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "<div class=\"col-md-2\">{label}</div>\n<div class=\"col-md-7\">{input}{error}</div><div class=\"col-md-3\"></div>\n",
                'labelOptions' => ['class' => 'text-left1'],
            ],
                //'enableAjaxValidation' => true,
                //'validateOnBlur' => true
            
        ]); ?>

        <?= $form->field($model, 'nama_calon')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'usia')->textInput() ?>
        <?= $form->field($model, 'pendidikan')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'jabatan_yang_dilamar')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($modelUploadCv, 'fileCv')->fileInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'status')->dropDownList(UserCalon::getStatus(), ['prompt' => '']) ?>
        <?php // $form->field($model, 'keputusan_id')->dropDownList(KeputusanTipe::getListData(), ['prompt' => '']) ?>

        <div class="col-md-2"></div>    
        <div class="form-group">
            <?= Html::submitButton( '<i class="glyphicon glyphicon-floppy-disk glyphicon-sm"> </i>'.Yii::t('app', ' Simpan') , ['class' => 'btn btn-primary btn-sm']) ?> &nbsp &nbsp
            <?= Html::a('<i class="glyphicon glyphicon-remove glyphicon-sm"></i> Cancel ', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php $script = <<<JS
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