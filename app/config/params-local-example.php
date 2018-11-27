<?php

return [
    'brand' => 'Interview App',
    'adminEmail' => 'sippkm@gmail.com',
    'noReplyEmail' => 'no-reply@afsyah.com',
    // Storage
    'uploadPath' => Yii::getAlias('@web') . '/uploads/',
    // URL
    'uploadUrl' => Yii::setAlias('@uploadsUrl', '/') . '/public/uploads/',
    'defaultImage' => Yii::setAlias('@defaultImage', '/') . '/public/images/no-images.png',
    'favicon' => Yii::setAlias('@defaultImage', '/') . '/public/images/favicon.ico',
    'id-ID' => Yii::setAlias('@defaultImage', '/') . '/public/images/flags/Indonesia-16.png',
    'en-US' => Yii::setAlias('@defaultImage', '/') . '/public/images/flags/United-Kingdom-16.png',
    'publicUrl' => Yii::setAlias('@publicUrl', '/public') . '/public/',
    'campaignImage' => Yii::setAlias('@publicUrl', '/public') . '/public/uploads/campaign/',
    'nameDatabase' => 'sippkm',
    'themes' => 'AdminLte', // list theme: MaterialAdmin, AdminLte, MaterialAdminBsb
];
