/* Task - Write a program to consume more than 300 MB of memory. Now reduce the memory limit and see what error you get.  */

<?php
    //set memory limit to 300MB
    ini_set('memory_limit','300M');

    $data = str_repeat('a',100*1024*1024); //Create a string of specified size
    echo "Memory consumed: ".round(memory_get_usage(true)/ (1024*1024),2)."MB\n";

    // Reduce memory limit to 200MB
    ini_set('memory_limit', '200M');

    // Attempt to consume more memory after reducing the limit
    $additionalMemory = str_repeat('b',500*1024*1024); // Try to allocate 50MB

    echo "Memory consumed after reducing limit: " . round(memory_get_peak_usage(true) / (1024 * 1024), 2) . " MB\n";

   
?>
