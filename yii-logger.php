#!/usr/bin/env php
<?php
use yii\web\Application;
use yii\web\IdentityInterface;

defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';

class IdentityClass implements IdentityInterface
{
    public function getId()
    {
        return 1;
    }

    public static function findIdentity($id) {}
    public static function findIdentityByAccessToken($token, $type = null) {}
    public function getAuthKey() {}
    public function validateAuthKey($authKey) {}
}

/** @noinspection PhpIncludeInspection */
$config = [
    'id' => 'test-log',
    'basePath' => __DIR__,
    'bootstrap' => ['log'],
    'components' => [
        'log' => require $argv[1],
        'user' => [
            'identityClass' => IdentityClass::class,
        ],
    ],
];

$application = new Application($config);
$application->getUser()->setIdentity(new IdentityClass());
$application->getSession()->open();
$messagesQty = count(\Yii::getLogger()->messages);
\Yii::getLogger()->flush();

$start = microtime(true);

for ($i = 0; $i < 10000; $i++) {
    \Yii::info("very very very very very very very very long test message {$i}");
}
\Yii::getLogger()->flush();

echo (microtime(true) - $start) . "\n";
