<?php

return [
    'adminEmail' => 'admin@example.com',
    'resetEmail' => 'no-reply@afsyah.com',
    // Storage
    'uploadsPath' => Yii::getAlias('@web') . '/uploads/',
    'publicPath' => Yii::getAlias('@web') . '/',
    // URL
    'uploadsUrl' => Yii::setAlias('@uploadsUrl', '/') . '/public/uploads/',
    'publicUrl' => Yii::setAlias('@publicUrl', '/public/') . '/public/',
    'defaultImage' => Yii::setAlias('@defaultImage', '/') . '/public/images/image-no-available.svg',
    'favicon' => Yii::setAlias('@defaultImage', '/') . '/public/images/favicon.ico',
    'id-ID' => Yii::setAlias('@defaultImage', '/') . '/public/images/flags/Indonesia-16.png',
    'en-US' => Yii::setAlias('@defaultImage', '/') . '/public/images/flags/United-Kingdom-16.png',
];
