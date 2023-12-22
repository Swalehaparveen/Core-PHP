<?php
    class Foo{}

    $foo = new Foo(); // Object
    $foo -> bar(); // This will generate an error

    // Implement __call method to handle undefined method calls
    class FooWithCall{
        public function __call($method, $args){
            echo $method."method called";
        }
    }

    $fooCall = new FooWithCall();
    $fooCall -> bar(); // This will now handled by __call

?>
