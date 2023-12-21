**Task1 -** Write a program to consume more than 300 MB of memory. Now reduce the memory limit and see what error you get.

**Analysis:**

1. **Setting Memory Limit:**

ini_set('memory_limit', '400M');
This line sets the PHP memory limit to 400MB using ini_set. This allows the script to consume up to 400MB of memory.

2. **Creating a string of specified size**
   
    $data = str_repeat('a', 100*1024*1024); // Creating a string of specified size (100*1024*1024)


**Solution**

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

**Output**

swaleha@swaleha:~/Desktop/PHP Assignments$ php Assignment1.php

Memory consumed: 102MB

PHP Fatal error:  Allowed memory size of 209715200 bytes exhausted (tried to allocate 524288032 bytes) in /home/swaleha/Desktop/PHP Assignments/Assignment1.php on line 12

PHP Stack trace:
PHP   1. {main}() /home/swaleha/Desktop/PHP Assignments/Assignment1.php:0
PHP   2. str_repeat($string = 'b', $times = 524288000) /home/swaleha/Desktop/PHP Assignments/Assignment1.php:12
   
