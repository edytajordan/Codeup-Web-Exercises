<?php  

class Server
{
    public $nouns = ['cat', 'dog', 'fish', 'reptile', 'bird', 'amphibian', 'sock', 'shoe', 'pants', 'shirt'];
    public $adjectives = ['big', 'small', 'red', 'blue', 'happy', 'sad', 'short', 'tall', 'fat', 'skinny']; 

    public function random($randomArray)
    {
        $randomWord = array_rand($randomArray);
        return $randomArray[$randomWord];
    }

    public function serverName()
    {

        $serverArray = [];

        $serverArray['nouns'] = $this->random($this->nouns);

        $serverArray['adjectives'] = $this->random($this->adjectives);

        return $serverArray;
    }
}
?>