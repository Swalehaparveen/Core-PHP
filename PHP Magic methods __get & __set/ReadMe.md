**Task 3 B -** Write a PHP code to demonstrate the usecase of __get() & __set() PHP Magic methods
**Analysis**

1. __get() allows access to properties that haven't been explicitly defined in the class. It retrieves values stored in the $userData array.
2. __set() allows setting properties dynamically. When properties like name, age, and email are set, they are stored in the $userData array.
3. This way, the User class can handle user data without explicitly defining properties for each attribute.
4. The magic methods __get() and __set() enable the class to dynamically handle properties, allowing the addition and retrieval of user-specific data.

   
**Solution**



