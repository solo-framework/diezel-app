<?php
/**
 *
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

error_reporting(E_ALL);
ini_set("display_errors", 0);

require '../../vendor/autoload.php';

use Dizel\Application;

$configFile = getenv("APP_CONFIG"); //$configFile = "config/cli.dev.php";
$isDebug = filter_var((getenv("APP_DEBUG_MODE")), FILTER_VALIDATE_BOOLEAN);

define("BASE_DIRECTORY", realpath("../../"));

Application::createApplication($configFile, $isDebug);
Application::getInstance()->run();