<?php
    /**
     * Write program in php (OOP style) which analyses schema of all the tables in database. 
     * c.) Foreign keys in the tables.
     */

     class DatabaseSchemaAnalyzer{
        private $connection;

        public function __construct($host, $username, $password, $database){
            $this-> connection = new mysqli($host, $username, $password, $database);

            if($this-> connection -> connect_error){
                die("Connection failed: ".$this -> connection -> connect_error);
            }
        }

        public function getTables(){
            $query = "SHOW TABLES";
            $result = $this -> connection -> query($query);

            $tables = [];
            while($row = $result -> fetch_row()){
                $tables[]= $row[0];
            }
            return $tables;
        }

        public function getForeignKeys($tableName){
            $query = "SHOW CREATE TABLE $tableName";
            $result = $this -> connection -> query($query);

            $foreignKeys = [];
            while($row = $result -> fetch_row()){
                $createTableSQL = $row[1];
                preg_match_all('/CONSTRAINT `([^`]*)` FOREIGN KEY \(`([^`]*)`\) REFERENCES `([^`]*)` \(`([^`]*)`\)/', $createTableSQL, $matches);

                if(!empty($matches[1])){
                    foreach($matches[1]as $index =>$keyName){
                        $foreignKeys[$keyName] = [
                            'column' => $matches[2][$index],
                            'references_table' => $matches[3][$index],
                            'references_column' => $matches[4][$index]
                        ];
                    }
                }
            }
            return $foreignKeys;
        }

        public function printTablesWithForeignKeys(){
            $tables = $this->getTables();

            foreach($tables as $table){
                echo "Table: $table\n";

                $foreignKeys = $this -> getForeignKeys($table);

                if(!empty($foreignKeys)){
                    foreach($foreignKeys as $keyName => $foreignKey){
                        echo "Foreign Key $keyName: ";
                        echo "{$foreignKey['column']} -> {$foreignKey['references_table']} ({$foreignKey['references_column']})\n";
                    }
                }else{
                    echo "No Foreign Keys\n";
            }
            echo "---------------------------------------------------\n";
        }

     }

     public function __destruct(){
        if($this -> connection){
            $this -> connection -> close();
        }
     }

    }

    //Usage

    $host = "localhost";
    $username = "swaleha";
    $password = "root";
    $database = "seapacm24_stage";

    $schemaAnalyzer = new DatabaseSchemaAnalyzer($host, $username, $password, $database);

    $schemaAnalyzer -> printTablesWithForeignKeys();

?>
