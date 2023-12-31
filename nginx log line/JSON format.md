**JSON**

1. **JSON (JavaScript Object Notation)** is a lightweight data-interchange format that is easy for both humans and machines to read and write.
2. It's widely used for transmitting data between a server and a web application as it's easy to parse and generate.

**Example of a simple JSON object:**

{

  "name": "John Doe",
  
  "age": 30,
  
  "isStudent": false,
  
  "address": {
  
    "street": "123 Main St",
    
    "city": "Anytown",
    
    "country": "USA"
    
    },
  
  "hobbies": ["reading", "hiking", "photography"]
  
}

1. **Object:** The outer curly braces {} define an object. It contains key-value pairs.
2. **Key-Value Pairs:** In JSON, data is represented as key-value pairs separated by a colon (:).
3. **"name":** "John Doe": Here, "name" is the key, and "John Doe" is the corresponding value. Keys are always strings, and values can be strings, numbers, booleans, arrays, objects, or null.
4. **Data Types:**
   i. **Strings:** Text data enclosed in double quotes (" ").
   ii. **Numbers:** Can be integers or floating-point numbers.
   iii. **Booleans:** true or false.
   iv. **Objects:** Nested sets of key-value pairs enclosed in curly braces {}.
   v. **Arrays:** Ordered lists of values enclosed in square brackets [].
   vi. **Nested Objects:** JSON supports nesting, allowing objects to contain other objects or arrays, enabling complex data structures.
5. **In the example:**
     i. The address field is an object containing address details.
     ii. The hobbies field is an array containing multiple hobby strings.

   
**JSON** is commonly used for **sending and receiving structured data in web services, APIs, configuration files, and more.** Its simplicity, readability, and flexibility make it a popular choice for data interchange between different systems and platforms.


