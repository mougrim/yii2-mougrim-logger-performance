<?php
use yii\log\FileTarget;

return [
    'traceLevel' => 0,
    'targets' => [
        [
            'class'  => FileTarget::class,
            'logFile' => '/home/sites/yii2-mougrim-logger-performance/yii-logger-default.log',
            'levels' => ['error', 'warning', 'info'],
        ],
    ],
];
