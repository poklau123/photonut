<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    //post图片压缩配置
    'compress' => [
        'max_width' => 483,
        'max_height' => 290
    ],

    //post图片上传配置
    'meta' => [
        'format' => 'png',
        'save_path' => '/post/origin/',
        'compress_path' => '/post/compress/',
        'prefix' => 'pic_',
    ],

    'avatar' => [
        'save_path' => 'avatar/',
        'save_format' => 'png',
        'width' => 100,
        'height' => 100
    ],

    'pic' => [
        'save_path' => 'pic/',
        'save_format' => 'png',
        'prefix' => 'pic_',
    ]

];
