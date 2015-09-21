<?php
use Mougrim\Logger\Logger as MougrimLogger;
use Mougrim\Logger\Appender\AppenderStream;

$logPath = '/home/sites/yii2-mougrim-logger-performance/mougrim-logger-without-format.log';
return [
    'policy'    => [
        'ioError'            => 'trigger_warn',
        'configurationError' => 'trigger_warn'
    ],
    'renderer'  => [
        'nullMessage' => '-',
    ],
    'appenders' => [
        'root_console_log' => [
            'class'    => AppenderStream::class,
            'stream'   => $logPath,
            'minLevel' => MougrimLogger::getLevelByName('info'),
        ],
    ],
    'root'      => ['appenders' => ['root_console_log']],
];
