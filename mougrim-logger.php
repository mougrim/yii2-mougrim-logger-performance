#!/usr/bin/env php
<?php
use Mougrim\Logger\Logger as MougrimLogger;
use Mougrim\Logger\LoggerMDC;
use mougrim\yii2Logger\Logger;
use yii\console\Application;
use yii\log\Logger as YiiLogger;

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
\Yii::$container->set(
    YiiLogger::class,
    [
        'class' => Logger::class,
    ]
);
/** @noinspection PhpIncludeInspection */
MougrimLogger::configure(require $argv[1]);
LoggerMDC::put('ip', '127.0.0.1');
LoggerMDC::put('userId', 1);
LoggerMDC::put('sessionId', '69u5oevbjp0c25d38rg4ahl114');
$config = [
    'id' => 'test-log',
    'basePath' => __DIR__,
    'bootstrap' => ['log'],
];
$application = new Application($config);
\Yii::getLogger()->flush();

$start = microtime(true);

for ($i = 0; $i < 10000; $i++) {
    \Yii::info("very very very very very very very very long test message {$i}");
}

echo (microtime(true) - $start) . "\n";
