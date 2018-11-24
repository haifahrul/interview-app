<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\FakultasUnit;
use app\models\Jabatan;

/* @var $model app\models\UserInterviewer */
/* @var $form yii\widgets\ActiveForm 
	author A. Fakhrurozi S.
*/

?>
<div class="box">
    <div class="user-interviewer-form box-body">
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

        <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nama_pewawancara')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'jabatan_id')->dropDownList(Jabatan::getListData(), ['prompt' => '']) ?>
        <?= $form->field($model, 'fakultas_unit_id')->dropDownList(FakultasUnit::getListData(), ['prompt' => '']) ?>
        <?= $form->field($model, 'is_active')->dropDownList(Yii::$app->globalFunction->isActiveList()) ?>

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