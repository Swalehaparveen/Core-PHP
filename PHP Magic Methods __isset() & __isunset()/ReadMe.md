**Task 3 D -** Write a PHP code to demonstrate the usecase of __isset() & __isunset() PHP Magic methods

**Analysis**

1. The class uses __isset() and __unset() to handle user properties that are dynamically set and checked for existence or unset:
2. The User class manages user data in the $userData array.
3. The setProperty() method is used to dynamically set user properties.
4. __isset() intercepts isset() calls and checks if a property exists in the user data array.
5. __unset() is triggered when unset() is called on a property. It removes the property if it exists, providing feedback on whether the property was successfully unset or if it doesn't exist.
6. This kind of setup can be useful for managing dynamic properties within an object, such as a user object where properties are not predefined, allowing you to check for their existence and remove them dynamically.
