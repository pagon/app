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

// Load env from file
if (is_file(__DIR__ . '/config/env')) {
    $app->mode(trim(file_get_contents(__DIR__ . '/config/env')));
}

$mode = $app->mode();
if (is_file($conf_file = __DIR__ . '/config/' . $mode . '.php')) {
    $app->append(include($conf_file));
}

// Boost application
$app->add('Booster');

// Functions
$app->assisting();

// Add pretty exception
if ($app->debug) {
    $app->add('PrettyException');
} else {
    error_reporting(E_ALL & ~E_NOTICE);
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