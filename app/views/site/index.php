<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use app\messages\Text;
use app\components\EnumColumn;
use app\models\KeputusanTipe;
use app\widgets\admin\components\Helper;
use app\models\UserCalon;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserCalonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Home');
$this->params['title'] = 'List'.$this->title;
?>
    
<h1>
    Pendaftaran
</h1>