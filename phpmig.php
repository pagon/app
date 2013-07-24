<?php

$app = require_once __DIR__ . '/bootstrap.php';

use \Phpmig\Adapter,
    \Phpmig\Pimple\Pimple;

$container = new Pimple();

if (empty($app->pdo)) {
    die('$app->pdo is not found, can not use phpmig' . PHP_EOL);
}

$container['pdo'] = $app->pdo;

$container['app'] = $app;

$container['phpmig.adapter'] = $container->share(function () use ($app) {
    return new Adapter\PDO\Sql($app->pdo, 'migrations');
});

$container['phpmig.migrations'] = function () {
    return glob(__DIR__ . DIRECTORY_SEPARATOR . 'migrations/*.php');
};

return $container;