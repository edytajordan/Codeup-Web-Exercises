<?php  
class Model
{
    private $attributes = [];

    public function __set($key, $value)
        {
            echo "Magic setter called!".PHP_EOL;
            echo "\$key: $key".PHP_EOL;
            echo "\$value: $value".PHP_EOL;

            // This code allows us to set values to new properties once we've already created an object
            $this->attributes[$key] = $value;
        }

    public function __get($key)
        {
            echo "Magic getter called!".PHP_EOL;
            echo "\$key: $key". PHP_EOL;

            // This checks to see if a value has been set 
            return isset($this->attributes[$key]) ? $this->attributes[$key] : null;
        }
}
?>