<?php
use Mougrim\Logger\Layout\LayoutSimple;
use Mougrim\Logger\Logger as MougrimLogger;
use Mougrim\Logger\Appender\AppenderStream;

$logPath = '/home/sites/yii2-mougrim-logger-performance/mougrim-logger-simple.log';
return [
    'policy'    => [
        'ioError'            => 'trigger_warn',
        'configurationError' => 'trigger_warn'
    ],
    'renderer'  => [
        'nullMessage' => '-',
    ],
    'layouts'   => [
        'simple' => [
            'class'   => LayoutSimple::class,
        ],
    ],
    'appenders' => [
        'root_console_log' => [
            'class'    => AppenderStream::class,
            'layout'   => 'simple',
            'stream'   => $logPath,
            'minLevel' => MougrimLogger::getLevelByName('info'),
        ],
    ],
    'root'      => ['appenders' => ['root_console_log']],
];
