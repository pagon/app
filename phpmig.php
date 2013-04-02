<?php

$app = require_once __DIR__ . '/bootstrap.php';

use \Phpmig\Adapter,
    \Phpmig\Pimple\Pimple;

$container = new Pimple();

if (empty($app->config['database'])) {
    die('Config "database" is not found' . PHP_EOL);
}

$container['pdo'] = $container->share(function () use ($app) {
    $config = $app->config['database'];
    $dsn = sprintf('%s:host=%s;port=%s', $config['type'], $config['host'], $config['port']);
    return new PDO($dsn, $config['username'], $config['password']);
});

$container['phpmig.adapter'] = $container->share(function ($container) {
    return new Adapter\PDO\Sql($container['pdo'], 'migrations');
});

$container['phpmig.migrations'] = function () {
    return glob(__DIR__ . DIRECTORY_SEPARATOR . 'migrations/*.php');
};

return $container;