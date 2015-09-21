<?php
use yii\log\FileTarget;

return [
    'traceLevel' => 0,
    'flushInterval' => 1,
    'targets' => [
        [
            'class'  => FileTarget::class,
            'logFile' => '/home/sites/yii2-mougrim-logger-performance/yii-logger-force-flush.log',
            'levels' => ['error', 'warning', 'info'],
            'exportInterval' => 1,
            'logVars' => [],
        ],
    ],
];
