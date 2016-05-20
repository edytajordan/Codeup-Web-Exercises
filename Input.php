<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        return (isset($_REQUEST[$key]));
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        // TODO: Fill in this function
        return (Input::has($key)) ? $_REQUEST[$key] : null;
    }

    public static function getString($key, $min = 0, $max = 50)
    {
        $string = self::get($key);
        
       if (!is_string($string) || is_numeric($string)) {
            throw new InvalidArgumentException("$string must be a string!");
        }elseif (empty($string)) {
            # code...
        }

        return $string;   
    }

    public static function getNumber($key, $min = 0, $max = 50)
    {
        $number = self::get($key);

        if (is_numeric($number)) {
            return (int)$number;
        } else {
            throw new InvalidArgumentException("$number must be a number!");
        }

        return $number;

        $min = self::get($min);

        if (!is_numeric($min)) {
            throw new InvalidArgumentException("Your argument is invalid");
            
        }

        $max = self::get($max);

        if (!is_numeric($max)) {
            throw new InvalidArgumentException("Your argument is invalid");
            
        }
    }

    public static function  getDate($key)
    {
        $date = self::get($key);

        $newDate = date_create($date);

        if (! ($newDate instanceof DateTime) && ! date_format($newDate, "YYYY-MM-DD" )) {
            throw new Exception("$date must be a date");
            
        }

        return $date;
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}

/**
* 
*/
