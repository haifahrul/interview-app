<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\widgets\admin\components\RouteRule;
use app\widgets\admin\AutocompleteAsset;
use yii\helpers\Json;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\widgets\admin\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
/* @var $context app\widgets\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$rules = Yii::$app->getAuthManager()->getRules();
unset($rules[RouteRule::RULE_NAME]);
$source = Json::htmlEncode(array_keys($rules));

$js = <<<JS
    $('#rule_name').autocomplete({
        source: $source,
    });
JS;
AutocompleteAsset::register($this);
$this->registerJs($js);
?>

<?php Pjax::begin(['id' => 'item-form']) ?>
<?php
$form = ActiveForm::begin([
            'id' => 'form-id',
            'options' => ['class' => 'form-horizontal', 'data-pjax' => true],
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => '<div class="col-md-3">{label}</div><div class="col-md-9">{input}{error}</div>',
                'labelOptions' => ['class' => 'text-left'],
            ],
                // 'enableAjaxValidation' => true,
                // 'validateOnBlur' => true
        ]);
?>
<div class="auth-item-form box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>
    <?= $form->field($model, 'ruleName')->textInput(['id' => 'rule_name']) ?>
    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>            
</div>
<div class="box-footer">
    <?php
    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Save') : Yii::t('app', 'Save'), [
        'class' => $model->isNewRecord ? 'btn btn-primary btn-sm' : 'btn btn-primary btn-sm',
        'name' => 'submit-button'])
    ?>
</div>
<?php ActiveForm::end(); ?>
<?php Pjax::end() ?> 
