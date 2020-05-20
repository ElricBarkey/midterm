<?php
/**
 * Class Validate
 * @author elric
 * @version 1.0
 */
class Validate
{

    /*
     * return a value if food parameter is valid
     * valid foods are not empty and do not contain anything except letters
     * @param string food
     * return boolean
     */

    function validName($name)
    {
        $name = str_replace(' ', '', $name);
        return !empty($name) && ctype_alpha($name);
    }


    /*
     * return a value if meal parameter is valid
     * valid meals are not empty and do not contain anything except letters
     * @param string meal
     * return boolean
     */

    function validOption($option)
    {
        $myOpt = getOptions();
        return in_array($option, $myOpt);
    }
}