<?php

return array(
    'timezone' => 'Asia/Shanghai',
    'views'    => dirname(__DIR__) . '/views',
    'autoload' => dirname(__DIR__) . '/src',
    'cookie'   => array(
        'path'     => '/',
        'domain'   => null,
        'secure'   => false,
        'httponly' => false,
        'timeout'  => 3600,
        'sign'     => false,
        'secret'   => 'cooke secret',
        'encrypt'  => false,
    ),
    'crypt'    => array(
        'key' => 'crypt key'
    )
);