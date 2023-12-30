<?php

/** 
     * Write program in php (OOP style) which analyses schema of all the tables in database. 
     * b) table and composite indexes on the table 
     */

     class DatabaseSchemaAnalyzer{
        private $connection;

        public function __construct($host, $username, $password, $database){
            $this-> connection = new mysqli($host,$username, $password,$database);

            if($this -> connection -> connect_error){
                die("Connection failed: ".$this -> connection -> connect_error);
            }
        }
        public function getTables(){
            $query = "SHOW TABLES";
            $resul = $this -> connection -> query($query);

            $tables = [];
            while ($row = $resul -> fetch_row()){
                $tables[]=$row[0];
            }
            return $tables;
        }

        public function getCompositeIndexes($tableName){
            $query = "SHOW INDEX FROM $tableName WHERE Non_unique = 1";
            $result = $this -> connection ->query($query);
            
            $compositeIndexes = [];
            while($row = $result->fetch_assoc()){
                $indexName = isset($row['Key_name'])? $row['Key_name']:(isset($row['key_name'])? $row['key_name']:null);
                if($indexName !== null){
                    if(!isset($compositeIndexes[$indexName])){
                        $compositeIndexes[$indexName]=[];
                    }
                    $compositeIndexes[$indexName][]=$row['Column_name'];
                    }
                }
            return $compositeIndexes;
        }

        public function printTablesWithCompositeIndexes(){
            $tables = $this -> getTables();

            foreach($tables as $table){
                echo "Table: $table\n";
                $compositeIndexes = $this -> getCompositeIndexes($table);

                if(!empty($compositeIndexes)){
                    foreach ($compositeIndexes as $indexName => $columns) {
                        echo "Composite Index $indexName: " . implode(', ', $columns) . "\n";
                    }
                } else {
                    echo "No Composite Indexes\n";
                }
                echo "-----------------------------------------------------\n";
            }
        }

        public function __destruct() {
            if($this->connection){
                $this->connection ->close();
            }
        }        
     }

     //Usage

     $host = "localhost";
     $username = "swaleha";
     $password = "root";
     $database = "seapacm24_stage";

     $schemaAnalyzer = new DatabaseSchemaAnalyzer($host, $username, $password, $database);
     $schemaAnalyzer ->printTablesWithCompositeIndexes();

?>
