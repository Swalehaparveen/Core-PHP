<?php

/**
 * 6. various PHP errors
 */

// Fatal Errors
// Uncaught Error - Call to undefined function
// undefinedFunction();

// Uncaught Error - Class not found
// $obj = new UndefinedClass();

// Warnings
// Use of undefined constant
// echo UNDEFINED_CONSTANT;

// Division by zero warning
// $result = 10 / 0;

// Notices
// Undefined index notice
// $arr = array("key1" => "value1");
// echo $arr["key2"];

// Accessing property of non-object notice
// $var = null;
// echo $var->property;

// Exceptions
// Division by zero exception
function divide($dividend, $divisor) {
    if ($divisor === 0) {
        throw new Exception('Division by zero');
    }
    return $dividend / $divisor;
}

try {
    echo divide(10, 0);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage();
}

