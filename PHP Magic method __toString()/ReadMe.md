**Task 3 C -** Write a PHP code to demonstrate the usecase of __toString() PHP Magic methods

**Analysis**

1. The Product class has private properties $name and $price, set via the constructor.
2. The __toString() method is defined in the class to return a string representation of the product. When an instance of Product is used in a string context (like echo), PHP automatically calls __toString() to convert the object to a string.
3. The echo $product; statement invokes __toString() to get the string representation of the $product object, displaying the product's name and price.
4. This method is useful when controlling how an object is represented as a string. It's often used for debugging, logging, or displaying meaningful information about an object in string contexts.
