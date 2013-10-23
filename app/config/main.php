<?php
/**
 * Main Config - DO NOT EDIT THIS FILE ON LIVE
 * create a file called: main.local.php
 *
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @author Zain Ul abidin <zainengineer@gmail.com>
 * @copyright 2013 Mr PHP
 * @link https://github.com/cornernote/yii-skeleton
 * @license http://www.gnu.org/copyleft/gpl.html
 */

$config = array(

    // yii settings
    'id' => $_ENV['_config']['setting']['id'],
    'name' => $_ENV['_config']['setting']['name'],
    'language' => $_ENV['_config']['setting']['language'],
    'charset' => $_ENV['_config']['setting']['charset'],

    // paths
    'basePath' => dirname(dirname(__FILE__)),
    'runtimePath' => dirname(dirname(dirname(__FILE__))) . DS . 'runtime',
    'aliases' => array(
        'core' => $_ENV['_config']['path'],
        'vendor' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor',
        'dressing' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor' . DS . 'mrphp' . DS . 'yii-dressing' . DS . 'src',
        'bootstrap' => dirname(dirname(dirname(__FILE__))) . DS . 'vendor' . DS . 'clevertech' . DS . 'yii-booster' . DS . 'src',
    ),

    // preload classes
    'preload' => array(
        'log',
        'dressing',
        'fatalErrorCatch',
        'globalInit',
    ),

    // import paths
    'import' => array(
        'application.commands.*',
        'application.models.*',
        'application.components.*',
    ),

    // modules
    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'generatorPaths' => array(
                'dressing.gii',
            ),
            'ipFilters' => array('127.0.0.1'),
        ),
    ),

    // components
    'components' => array(
        'globalInit' => array(
            'class' => 'dressing.components.YdGlobalInit',
            'timezone' => $_ENV['_config']['setting']['timezone'],
            'timeLimit' => $_ENV['_config']['setting']['time_limit'],
            'memoryLimit' => $_ENV['_config']['setting']['memory_limit'],
        ),
        'dressing' => array(
            'class' => 'dressing.YiiDressing',
            'tableMap' => array(
                'YdSetting' => $_ENV['_config']['db']['setting'],
            ),
        ),
        'errorHandler' => array(
            'class' => 'dressing.components.YdErrorHandler',
            'errorAction' => 'site/error',
        ),
        'fatalErrorCatch' => array(
            'class' => 'dressing.components.YdFatalErrorCatch',
        ),
        'user' => array(
            'class' => 'dressing.components.YdWebUser',
            'allowAutoLogin' => true,
            'loginUrl' => array('/account/login'),
        ),
        'returnUrl' => array(
            'class' => 'dressing.components.YdReturnUrl',
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.Bootstrap',
            'fontAwesomeCss' => true,
        ),
        'urlManager' => array(
            'urlFormat' => isset($_GET['r']) ? 'get' : 'path', // allow filters in audit/index work
            'showScriptName' => false,
        ),
        'db' => array(
            'connectionString' => "mysql:host={$_ENV['_config']['db']['host']};dbname={$_ENV['_config']['db']['name']}",
            'emulatePrepare' => true,
            'username' => $_ENV['_config']['db']['user'],
            'password' => $_ENV['_config']['db']['pass'],
            'charset' => 'utf8',
            'schemaCachingDuration' => 3600,
            'enableProfiling' => $_ENV['_config']['setting']['debug_db'],
            'enableParamLogging' => $_ENV['_config']['setting']['debug_db'],
        ),
        'cacheFile' => array(
            'class' => 'CFileCache',
        ),
        'cacheDb' => array(
            'class' => 'CDbCache',
        ),
        'cache' => array(
            'class' => 'CMemCache',
            'keyPrefix' => $_ENV['_config']['setting']['id'] . '.',
            'servers' => array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 10,
                ),
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
        ),
        'clientScript' => array(
            'class' => 'YdClientScript',
        ),
        'swiftMailer' => array(
            'class' => 'application.extensions.swiftMailer.SwiftMailer',
        ),
    ),

    // default settings, access using: Setting::item('paramName')
    // add field to views.setting.index to allow override
    'params' => array(
        'dateFormat' => 'Y-m-d',
        'dateFormatLong' => 'Y-m-d',
        'timeFormat' => 'H:i:s',
        'timeFormatLong' => 'H:i:s',
        'dateTimeFormat' => 'Y-m-d H:i:s',
        'dateTimeFormatLong' => 'Y-m-d H:i:s',
        'allowAutoLogin' => true,
        'rememberMe' => true,
        'defaultPageSize' => '10',
        'recaptcha' => false,
        'recaptchaPrivate' => '6LeBItQSAAAAALA4_G05e_-fG5yH_-xqQIN8AfTD',
        'recaptchaPublic' => '6LeBItQSAAAAAG_umhiD0vyxXbDFbVMPA0kxZUF6',
        'hashKey' => 'abc123',
    ),

);
// local main config overrides
if (file_exists(dirname(__FILE__) . '/main.local.php')) {
    require(dirname(__FILE__) . '/main.local.php');
}
return $config;
