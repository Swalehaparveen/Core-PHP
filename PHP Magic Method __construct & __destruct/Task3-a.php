<?php
// __construct() & destruct() example
    class FileHandler {
        private $file;

        public function __construct($fileName, $mode='a+'){
            $this ->file = fopen($fileName, $mode);
            if(!$this->file){
                throw new Exception("Fail to open file : $fileName");
            }
        }
        
        public function writeText($text){
            fwrite($this->file, $text);
        }

        public function readText($fileName){
            if (file_exists($fileName)) {
                $fileContent = file_get_contents($fileName);
                echo "File content:\n$fileContent\n";
            } else {
                echo "File '$fileName' does not exist.";
            }
        }

        public function __destruct(){
            if($this ->file){
                fclose($this->file);
            }
        }
    }

    //Usage
    try {
          $fileHandler = new FileHandler('/home/swaleha/Downloads/Dev Tasks/PHP Assignments/example.txt');
          $fileHandler->writeText("Hello, this text is written to the file!!!");
          $fileHandler->readText('/home/swaleha/Downloads/Dev Tasks/PHP Assignments/example.txt');
        } catch (Exception $e) {
           echo 'Error: '.$e->getMessage();
        }
        // When $fileHandler goes out of scope or unset, __destruct will call automatocally close the file.

?>

