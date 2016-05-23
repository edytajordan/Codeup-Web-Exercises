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
            throw new DomainException("$string is the wrong data type!");
            
        }elseif (empty($string)) {
            throw new OutofRangeException("You must enter a value");
        }elseif (strlen($string) > $max) {
            throw new LengthException("You've run out of characters");
            
        }elseif (strlen($string) < $min) {
            throw new LengthException("You need to type more characters");
            
        }

        return $string;   
    }

    public static function getNumber($key, $min = 0, $max = 50)
    {
        $number = self::get($key);

        if (is_numeric($number)) {
            $number = (int)$number;
        }elseif (!is_numeric($number)) {
            throw new DomainException("$number is the wrong data type!");
            
        }else {
            throw new InvalidArgumentException("$number must be a number!");
        }

        if (empty($number)) {
            throw new OutofRangeException("You must enter a value");
        }

        if (!is_numeric($min)) {
            throw new InvalidArgumentException("Your argument is invalid");
            
        }

        if (!is_numeric($max)) {
            throw new InvalidArgumentException("Your argument is invalid");   
        }

        if ($number < $min) {
            throw new RangeException("Your number is too small");
            
        }elseif ($number > $max) {
            throw new RangeException("Your number is too big");
            
        }

        return $number;
    }

    public static function  getDate($key)
    {
        $date = self::get($key);

        $newDate = date_create($date);

        if (!($newDate instanceof DateTime)) {
            throw new Exception("$date must be a date!"); 
            throw new DomainException("$date is the wrong data type!");
              
        }elseif (empty($date)) {
            throw new OutofRangeException("You must enter a value");
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
