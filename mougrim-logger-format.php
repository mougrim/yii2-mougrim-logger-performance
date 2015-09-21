<?php
use Mougrim\Logger\Layout\LayoutPattern;
use Mougrim\Logger\Logger as MougrimLogger;
use Mougrim\Logger\Appender\AppenderStream;

$logPath = '/home/sites/yii2-mougrim-logger-performance/mougrim-logger-format.log';
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
            'class'   => LayoutPattern::class,
            'pattern' => '[{date:Y-m-d H:i:s}] {logger}.{level} {message} {ex}',
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
