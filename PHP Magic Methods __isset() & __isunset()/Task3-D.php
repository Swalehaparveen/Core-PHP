<?php 
    // The usecase of __isset() & __unset() PHP Magic methods
    class User{
        private $userData =[];

        public function __isset($name){
            return isset($this->userData[$name]);
        }

        public function __unset($name){
            if(isset($this->userData[$name])){
                unset($this->userData[$name]);
                echo "Unset property '$name' for the user\n";
            }else{
                echo "Property '$name' doesn't exist for the user\n";
            }
        }

        public function setProperty($name, $value){
            $this->userData[$name]=$value;
            echo "Set property '$name' for the user\n";
        }
    }

    $user = new User();

    $user->setProperty('username', 'John Doe');
    $user->setProperty('email','john@example.com');

    // Check if properties exist using isset()
    if (isset($user->username)){
        echo "Username exists for the user\n"; //Output: Username exists for the user
    }

    if(isset($user->email)){
        echo "Email exists for the user\n"; //Output: Email exists for the user
    }

    if(isset($user->age)){
        echo "Age exists for the user\n"; // This won't output as 'age' is not set
    }

    //Unset properties using unset()
    unset ($user->username); // Output: Unset property 'username' for the user
    unset($user->age); // Output: Property 'age'doesn't exist for the user

?>
