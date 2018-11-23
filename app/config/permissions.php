<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return [
//    'class' => 'app\modules\administrator\components\AccessControl',
    'class' => 'mdm\admin\components\AccessControl',
//    'class' => 'app\widgets\admin\components\AccessControl',
    'allowActions' => [
        // add wildcard allowed action here!
        'site/login',
        'site/logout',
        'debug/*',
    //    'administrator/*', // only in dev mode
    //  '*'
    ]
];
