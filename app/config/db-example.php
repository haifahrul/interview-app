<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

return
        [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=NAMA_DATABASE;port=3306',
            'username' => 'USERNAME',
            'password' => 'PASSWORD',
            'charset' => 'utf8',
            'enableSchemaCache' => false,
//            // Duration of schema cache.
//            'schemaCacheDuration' => 3600,
//            // Name of the cache component used to store schema information
//            'schemaCache' => 'cache',
//            'on afterOpen' => function($event) {
//            // $event->sender refers to the DB connection
//                $event->sender->createCommand("SET time_zone = '+7'")->execute();
//            }
];
