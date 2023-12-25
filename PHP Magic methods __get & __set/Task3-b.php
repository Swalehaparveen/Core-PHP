<?php
    // use case of __get() and  __set()
    class User{
        private $userData = [];
        public function __get($name){
            return $this->userData[$name] ?? null;
        }

        public function __set($name, $value){
            $this->userData[$name]=$value;
        }
    }

    $user = new User();

    // Set user properties dynamically using __set()
    $user->name = 'Merry';
    $user->age = 23;
    $user->email = 'merry@gmail.com';

    // Retrieve user propertues dynamically using __get()
    echo "Name:".$user->name."\n";
    echo "Age:".$user->age."\n";
    echo "Email:".$user->email."\n";
    echo "City:".$user->city."\n";
?>
