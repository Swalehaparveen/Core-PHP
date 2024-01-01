
<?php
    /**
     * 3. Undefined index
     */

     // Create an array without defining an index
     $array = array(
        "name" => "John",
        "age" => 35,
        // "email" key is missing
     );

     //Trying to access an undefined index 'email'
     echo $array["name"];
     echo $array["age"];
     echo $array["email"];

?>
