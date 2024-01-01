<?php
    /**
     * 4. MYSQL connection failed
     */

     //MYSQL connect failed
     $servername = "localhost";
     $username = "swaleha";
     $password = "root";
     $database = "test";

     //Create connection
     $conn = new mysqli($servername, $username, $password, $database);

     //check connection
     if($conn ->connect_error){
        die("Connection failed: ". $conn->connect_error);
     }
?>
