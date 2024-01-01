<?php
    /**
     * Create examples of code that trigger various fatal errors and other errors.
     * 2. Memory limit exceeded
     */

     // Set a very low memory limit (for demonstration purposes)
     ini_set('memory_limit','1M'); // Limit memory to 1 Megabyte

     // Create an array that will exceed the memory limit
     $largeArray = [];

     for($i = 0; $i < 100000; $i++){
        $largeArray[] = str_repeat('a',1024); // Add a string of 1024 characters to the array
     }
?>
