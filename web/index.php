<?php
/**
 * File: index.php
 * Author: frame@it163.org
 * Date: 18/6/23 13:56
 * Link: http://www.it163.org/
 */

define('APP_ROOT', dirname(__DIR__));

require APP_ROOT . '/vendor/autoload.php';

$GLOBALS['db'] = require APP_ROOT . '/app/config/db.php';

//开始运行
(new \vendor\frame\Application())->run($GLOBALS);