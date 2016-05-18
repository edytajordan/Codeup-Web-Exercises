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
}
?>