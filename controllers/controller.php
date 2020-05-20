<?php

/**
 * Class Controller
 */
class Controller
{
    private $_f3; //router
    private $_validator; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validator
     */
    public function __construct($f3, $validator)
    {
        $this->_f3 = $f3;
        $this->_validator = $validator;
    }

    /**
     * Display the default route
     */
    public function home()
    {
        echo "<h1>Midterm Survey</h1>";
        echo "<a href= 'survey' >Take my Midterm Survey</a>";
    }


    /**
     *
     */
    public function survey()
    {
        $options = getOptions();

        //Validate food
        /*
        if (!$this->_validator->validName($_POST['name'])) {

            //Set an error variable in the F3 hive
            $this->_f3->set('errors["name"]', "Invalid name");
        }

        if (!$this->_validator->validOptions($_POST['option'])) {

            //Set an error variable in the F3 hive
            $this->_f3->set('errors["option"]', "Invalid option.");
        }
        */

        //if the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if ($_POST['name'] == "" )
            {
                echo "<h3 class='text-danger'>Please enter your name and select a survey option</h3>";
            }

            else{
                //store the data in the session array
                $_SESSION['options'] = $_POST['options'];
                $_SESSION['name'] = $_POST['name'];

                $this->_f3->reroute('summary');
                session_destroy();
            }

        }

        $this->_f3->set('options', $options);
        $this->_f3->set('name', $_POST['name']);
        $this->_f3->set('selectedOptions', $_POST['option']);


        $view = new Template();
        echo $view->render('views/survey.html');
    }

    /**
     *
     */
    public function summary()
    {
        $view = new Template();
        echo $view->render('views/summary.html');

        session_destroy();
    }
}