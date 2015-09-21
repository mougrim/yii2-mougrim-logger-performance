<?php
use yii\log\FileTarget;

return [
    'traceLevel' => 0,
    'targets' => [
        [
            'class'  => FileTarget::class,
            'logFile' => '/home/sites/yii2-mougrim-logger-performance/yii-logger-force-export.log',
            'levels' => ['error', 'warning', 'info'],
            'exportInterval' => 1,
            'logVars' => [],
        ],
    ],
];
