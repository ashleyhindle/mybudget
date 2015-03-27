<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

$env = getenv('APP_ENV') ?: 'prod';

if ($env != 'prod') {
    ini_set('display_errors', 1);
    error_reporting(-1);
    Debug::enable();
    ErrorHandler::register();
    if ('cli' !== php_sapi_name()) {
        ExceptionHandler::register();
    }
}

$app = require __DIR__.'/../src/app.php';

require __DIR__.'/../src/controllers.php';

/**
 * @var Silex\Application $app
 */
$app->run();