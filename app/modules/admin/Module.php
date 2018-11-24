<?php

namespace app\modules\admin;

use yii\web\ErrorAction;
use \yii\web\ErrorHandler;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module {

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();
        // custom initialization code goes here
        \Yii::$app->homeUrl = '/admin/site/index';
        $this->layoutPath = '@app/themes/adminlte/layouts';
        $this->layout = 'main';
        \Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::className(),
                    'errorAction' => '/admin/site/error'
                ]
            ],
        ]);

        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        \Yii::$app->set('errorHandler', $handler);
        $handler->register();
    }

}
