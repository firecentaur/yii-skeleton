<?php
/**
 * Yii CLI
 */

// start the timer
$_ENV['_start'] = microtime(true);

// include globals
require_once(dirname(__FILE__) . DS . 'app' . DS . 'globals.php');

// run yii-dressing
require_once(dirname(__FILE__) . DS . 'vendor' . DS . 'mrphp' . DS . 'yii-dressing' . DS . 'src' . DS . 'entry' . DS . 'yiic.php');
