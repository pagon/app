<?php
/**
 *
 * Bootstrap file for universal load.
 *
 * This file will be load by cli and web entry, you can define or config the application as global use.
 *
 */

use Pagon\App;

define('APP_DIR', __DIR__);

require __DIR__ . '/vendor/autoload.php';

$app = new App(__DIR__ . '/config/default.php');

$mode = $app->mode();
if (is_file($conf_file = __DIR__ . '/config/' . $mode . '.php')) {
    $app->append(include($conf_file));
}

$app->protect('loadDB', function () {
    global $app;
    $config = $app->database;
    ORM::configure(buildDsn($config));
    ORM::configure('username', $config['username']);
    ORM::configure('password', $config['password']);
    Model::$auto_prefix_models = '\\Model\\';
});

$app->share('pdo', function ($app) {
    $config = $app->database;
    return new PDO(buildDsn($config), $config['username'], $config['password'], $config['options']);
});

return $app;

/**
 * build Dsn string
 *
 * @param array $config
 * @return string
 */
function buildDsn(array $config)
{
    return sprintf('%s:host=%s;port=%s;dbname=%s;charset=%s', $config['type'], $config['host'], $config['port'], $config['dbname'], $config['charset']);
}