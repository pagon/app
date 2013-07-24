<?php

/** @var $app \Pagon\App */
$app = include dirname(__DIR__) . '/bootstrap.php';

$app->get('/', '\Route\Web\Index');

$app->run();