<?php
use Mougrim\Logger\Logger as MougrimLogger;
use Mougrim\Logger\Appender\AppenderStream;
use mougrim\yii2Logger\Layout;

$logPath = '/home/sites/yii2-mougrim-logger-performance/mougrim-logger-like-yii.log';
return [
    'policy'    => [
        'ioError'            => 'trigger_warn',
        'configurationError' => 'trigger_warn'
    ],
    'renderer'  => [
        'nullMessage' => '-',
    ],
    'layouts'   => [
        'yii-like' => [
            'class'   => Layout::class,
            'logUserInfo' => true,
        ],
    ],
    'appenders' => [
        'root_console_log' => [
            'class'    => AppenderStream::class,
            'layout'   => 'yii-like',
            'stream'   => $logPath,
            'minLevel' => MougrimLogger::getLevelByName('info'),
        ],
    ],
    'root'      => ['appenders' => ['root_console_log']],
];
