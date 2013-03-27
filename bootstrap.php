<?php

use Pagon\App;

define('APP_DIR', __DIR__);

require __DIR__ . '/vendor/autoload.php';

$app = new App(__DIR__ . '/config/default.php');

$app->configure(function ($mode) use ($app) {
    $conf_file = __DIR__ . '/config/' . $mode . '.php';
    if (is_file($conf_file)) {
        $app->config->add(include($conf_file));
    }
});

return $app;