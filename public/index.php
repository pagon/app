<?php
/**
 *
 * Web entry
 *
 * The web server root must set to this directory, and use index.php as the entry, you can register much more web route in this file to supply the web interface.
 *
 */

/** @var $app \Pagon\App */
$app = include dirname(__DIR__) . '/bootstrap.php';

$app->get('/', '\Route\Web\Index');

$app->run();