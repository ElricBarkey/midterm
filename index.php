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

//default route
$f3->route('GET /', function()
{
    echo "<h1>Midterm Survey</h1>";
    echo "<a href= 'survey' >Take my Midterm Survey</a>";

});

//survey route
$f3->route('GET /survey', function($f3)
{
    $options = getOptions();

    //if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //store the data in the session array
        $_SESSION['options'] = $_POST['options'];

        $f3->reroute('summary');
        session_destroy();

    }

    $f3->set('options', $options);

    $view = new Template();
    echo $view->render('views/survey.html');
});


//run f3
$f3->run();

