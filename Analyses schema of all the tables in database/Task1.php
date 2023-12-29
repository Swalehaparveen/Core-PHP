<?php
    /** 
     * Write program in php (OOP style) which analyses schema of all the tables in database. 
     * a) It should be able to print tables and unique indexes on the table 
     */
    
    class DatabaseSchemaAnalyzer{
        private $connection;

        public function __construct($host, $username, $password, $database){
            $this->connection = new mysqli($host,$username, $password, $database);
            if ($this->connection->connect_error){
                die("Connection failed: ".$this->connection->connect_error);
            }
        }

        public function getTables(){
            $query = "SHOW TABLES";
            $result = $this->connection->query($query);

            $tables = [];

            while($row = $result -> fetch_row()){
                $tables[]=$row[0];
            }

            return $tables;
        }

        public function getUniqueIndexes($tableName){
            $query = "SHOW INDEX FROM $tableName WHERE Non_unique=0";
            $result = $this->connection->query($query);

            $indexes = [];
            while ($row = $result->fetch_assoc()) {
                // Fetch the correct column name for index
                $indexColumn = isset($row['Column_name']) ? $row['Column_name'] : (isset($row['Column_name']) ? $row['Column_name'] : null);
                if ($indexColumn) {
                    $indexes[] = $indexColumn;
                }
            }
            return $indexes;
        }

        public function printTableWithUniqueIndexes(){
            $tables= $this-> getTables();

            foreach($tables as $table){
                echo "Tables: $table\n";

                $indexes = $this->getUniqueIndexes($table);

                if(!empty($indexes)){
                    echo "Unique Indexes: ".implode(',',$indexes)."\n";
                }else{
                    echo "No Unique Indexes\n";
                }
                echo "----------------------------------------\n";
            }
        }

        public function __destruct(){
            if($this->connection){
                $this->connection->close();
            }
        }
    } 

    //Usage
    $host = "localhost";
    $username = "swaleha";
    $password = "root";
    $database = "seapacm24_stage";

    $schemaAnalyzer = new DatabaseSchemaAnalyzer($host, $username, $password, $database);
    $schemaAnalyzer->printTableWithUniqueIndexes();
?>
