<?php
return [
    // setting domain name
    'name' => 'percetakan-atin.test', 
    'components' => [
        'db' => [
            // setting your db local
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yarsi_ibnu',
            'username' => 'guest',
            'password' => 'guest',
            'charset' => 'utf8',
            'enableSchemaCache' => false,
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'useFileTransport' => false, // false agar bisa kirim lewat online
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.afsyah.com',
                'username' => 'mailer@afsyah.com',
                'password' => 'L?!#bmnju_#W', // setting sesuai kebutuhan
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'session' => [
            'class' => 'yii\web\Session',
            // 'cookieParams' => ['httponly' => true, 'lifetime' => 3600 * 4],
            // 'timeout' => 3600 * 4, //session expire
//            'useCookies' => false,
        ],
    ],
];