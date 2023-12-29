**Class DatabaseSchemaAnalyzer**

**Constructor __construct:**

Initializes a database connection using the provided credentials.
If the connection fails, it displays an error message and terminates the script.

**Method getTables:**

Executes a SQL query (SHOW TABLES) to fetch all tables in the specified database.
Stores the table names in an array and returns it.

**Method getUniqueIndexes:**

Takes a table name as a parameter.
Executes a SQL query (SHOW INDEX FROM $tableName WHERE Non_unique=0) to retrieve unique indexes for the given table.
Collects the names of columns that define unique indexes and returns them in an array.

**Method printTableWithUniqueIndexes:**

Utilizes getTables method to get all table names.
For each table, it prints the table name and fetches its unique indexes using getUniqueIndexes.
Displays the unique indexes for each table or indicates if there are none.

**Destructor __destruct:**

Closes the database connection when the instance of DatabaseSchemaAnalyzer is destroyed.
Usage
Sets the database connection credentials ($host, $username, $password, $database).
Creates an instance of DatabaseSchemaAnalyzer by passing the credentials to the constructor.
Invokes the printTableWithUniqueIndexes method, which fetches and displays table names along with their unique indexes.

