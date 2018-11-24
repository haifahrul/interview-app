<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
//    'mimin' => [
//        'class' => '\hscstudio\mimin\Module',
//    ],
    'admin' => [
        'class' => 'app\widgets\admin\Module',
        'layout' => 'left-menu',
        'mainLayout' => '@app/themes/adminlte/layouts/main.php',
        'menus' => [
//            'assignment' => [
//                'label' => Yii::t('app', 'Memberikan Akses')
//            ],
            'role' => [
                'label' => Yii::t('app', 'Penugasan (Roles)')
            ],
            'permission' => [
                'label' => Yii::t('app', 'Hak Akses (Permissions)')
            ],
            'route' => [
                'label' => Yii::t('app', 'Rute (Routes)')
            ],
            'user' => null, // disable menu
//            'route' => null, // disable menu
            'rule' => null, // disable menu
        ],
        'controllerMap' => [
            'assignment' => [
                'class' => 'app\widgets\admin\controllers\AssignmentController',
                'userClassName' => 'app\widgets\admin\models\User',
            ],
        ],
    ],
    'userManagement' => [
        'class' => 'app\modules\userManagement\Module',
    ],
    'admin' => [
        'class' => 'app\modules\admin\Module',
    ],
    'log' => [
        'class' => 'app\modules\log\Module',
    ],
//    'gii' => [
//        'class' => 'yii\gii\Module',
//        'allowedIPs' => ['127.0.0.1', '::1', '192.168.1.*', 'XXX.XXX.XXX.XXX'] // adjust this to your needs
//    ],
    'gridview' => ['class' => 'kartik\grid\Module'],
    'pdfjs' => [
        'class' => '\yii2assets\pdfjs\Module',
    ],
];
