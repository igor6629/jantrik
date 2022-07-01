<?php

define("DEBUG", 1);

define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/jantrik/core');
define("LIBS", ROOT . '/vendor/jantrik/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');

define("LAYOUT", 'jantrik');

// http://jantrik.loc/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
// http://jantrik.loc/public/
$app_path = preg_replace("#[^/]+$#",'', $app_path);
// http://jantrik.loc
$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", $app_path . '/admin');

require_once ROOT . '/vendor/autoload.php';