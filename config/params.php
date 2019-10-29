<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',

// 图片服务器的域名设置，拼接保存在数据库中的相对地址，可通过web进行展示
    'domain' => 'https://miniprogram.kan0512.com',
    'webuploader' => [
        // 后端处理图片的地址，value 是相对的地址
        'uploadUrl' => 'uploads/index',
        // 多文件分隔符
        'delimiter' => ',',
        // 基本配置
        'baseConfig' => [
            'defaultImage' => 'http://ceshi_admin.com/it/u=2056478505,162569476&fm=26&gp=0.jpg',
            'disableGlobalDnd' => true,
            'accept' => [
                'title' => 'Images',
                'extensions' => 'gif,jpg,jpeg,bmp,png',
                'mimeTypes' => 'image/*',
            ],
            'pick' => [
                'multiple' => false,
            ],
        ],
    ],
    'imageUploadRelativePath' => './uploads/', // 图片默认上传的目录
    'imageUploadSuccessPath' => '/uploads/', // 图片上传成功后，路径前缀

    'MINI_APPID' => '123',
    'MINI_APP_SECRET'=>'123123',
    'MCH_ID'=>'123123',
];
