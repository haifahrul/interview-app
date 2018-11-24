<?php

$db = require(__DIR__ . '/db.php');
$params = require(__DIR__ . '/params-local.php');

return [
    'id' => '', // set sesuai dengan nama aplikasi anda
    'name' => '', // set sesuai dengan nama aplikasi anda
    'components' => [
        'db' => $db,
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'useFileTransport' => false, // false agar bisa kirim lewat online
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => '', // host mail server
                'username' => '',
                'password' => '', // setting sesuai kebutuhan
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
//        'view' => [
//            'theme' => [
//                'pathMap' => [
////                    '@app/modules' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
//                ],
//            ],
//        ],
    ],
    'params' => $params,
];
