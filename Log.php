<?php 
    class Log
    {
        public $fileName;
        public $handle; 

        public function __construct($prefix = 'log')
        {
            $logDate = date('Y-m-d');
            $this->fileName = "{$prefix}-{$logDate}.log";
            $this->handle = fopen($this->fileName, 'a');
        }

        public function logMessage ($logLevel, $message) 
        {
            $logDate = date('Y-m-d');
            $logTime = date('h:i:s');
            
            $dateLog = [];

            $message = $logDate.' '.$logTime.' [ '.$logLevel.' ] '.$message;
           
            fwrite($this->handle, $message.PHP_EOL);   
             
        }
        
        public function info ($logMessage)
        {
            $this -> logMessage("INFO",$logMessage);
        }
        
        public function error ($logMessage)
        {
            $this -> logMessage("ERROR", $logMessage);
        }

        public function __destruct()
        {
            $this->handle = fclose($this->handle); 
        }
    }

    class File
    {
        public $fileName;
        public $handle;

        public function __construct($fileName)
        {
              $this->handle = fopen($fileName, 'a');
        }

        public function append($file)
        {
            $message = 'Hello Joshua!'.PHP_EOL;

            fwrite($this->handle, $message);
           
        }

        public function close()
        {
            $this->handle = fclose($this->handle);  
        } 

        
    }
?>