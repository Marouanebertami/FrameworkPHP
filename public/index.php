<?php

// create Namespace
namespace MPHP;

// import FrontController With the Namespace Methode
use MPHP\LIB\FrontController;

/*if(!defined('DS')){
	define( 'DS', DIRECTORY_SEPARATOR );
}*/

// if syntax
defined('DS') ? null : define( 'DS', DIRECTORY_SEPARATOR );

//require the config fille
require_once '..'. DS . 'app' . DS . 'config.php';

// require the autoload file
require_once APP_PATH . DS . 'lib' . DS . 'autoload.php';

// instance the front controller
$frontController = new FrontController();

// execute the dispath function
$frontController->dispath();
