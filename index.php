<?php
//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//start a session
session_start();

//require the auto load file
require_once ("vendor/autoload.php");
require_once ("model/data-layer.php");

//instantiate the F3 Base class
$f3 = Base::instance();
$validator = new Validate();
$controller = new Controller($f3, $validator);

//default route
$f3->route('GET /', function()
{
    $GLOBALS['controller']->home();
});

//summary route
$f3->route('GET /summary', function()
{
    $GLOBALS['controller']->summary();
});


//survey route
$f3->route('GET|POST /survey', function($f3)
{
    $GLOBALS['controller']->survey();
});


//run f3
$f3->run();

