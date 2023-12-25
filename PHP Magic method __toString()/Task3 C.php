<?php
    // The usecase of __toString() PHP Magic method.

    class Product{
        private $name;
        private $price;

        public function __construct($name, $price){
            $this->name = $name;
            $this->price = $price;
        }
        public function __toString(){
            return "Product: {$this->name}, Price: {$this ->price}";
        }
    }

    $product = new Product("Phone", 25000.00);

    echo $product; // output: Product: Phone, 25000.00
?>
