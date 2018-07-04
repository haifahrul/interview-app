<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\admin\models\Menu;
use yii\helpers\Json;
use app\widgets\admin\AutocompleteAsset;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\widgets\admin\models\Menu */
/* @var $form yii\widgets\ActiveForm */
AutocompleteAsset::register($this);
$opts = Json::htmlEncode([
            'menus' => Menu::getMenuSource(),
            'routes' => Menu::getSavedRoutes(),
        ]);
$this->registerJs("var _opts = $opts;");
$this->registerJs($this->render('_script.js'));
?>

<?php Pjax::begin(['id' => 'form']) ?>
<?php
$form = ActiveForm::begin([
            'id' => 'form-id',
            'options' => ['class' => 'form-horizontal', 'data-pjax' => true],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => '<div class="col-md-2">{label}</div><div class="col-md-10">{input}{error}</div>',
                'labelOptions' => ['class' => 'text-left'],
            ],
                // 'enableAjaxValidation' => true,
                // 'validateOnBlur' => true
        ]);
?>
<div class="menu-form">    
    <?= Html::activeHiddenInput($model, 'parent', ['id' => 'parent_id']); ?>
    <div class="row">
        <div class="box-body">        
            <div class="col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
                <?= $form->field($model, 'parent_name')->textInput(['id' => 'parent_name']) ?>
                <?= $form->field($model, 'route')->textInput(['id' => 'route']) ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'order')->input('number') ?>
                <?= $form->field($model, 'data')->textarea(['rows' => 4]) ?>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <?= app\components\Buttons::submitButton() ?>
    </div>    
</div>
<?php ActiveForm::end(); ?>
<?php Pjax::end() ?>