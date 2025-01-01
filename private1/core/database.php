<?php 

class Database {
    private function connect(){
        $string = "mysql:host=localhost;dbname=school_db";
        if (!$con = new PDO($string, 'root', '')) {
            die("Could not connect to the database");
        }
        return $con;
    }

    // Method for running SELECT queries and returning results
    public function query($query, $data = array(), $data_type = "object") {
        $con = $this->connect();
        $stm = $con->prepare($query);
        
        if ($stm) {
            $check = $stm->execute($data);
            if ($check) {
                // Return the fetched data based on the requested type (object or array)
                if ($data_type == "object") {
                    return $stm->fetchAll(PDO::FETCH_OBJ); // Fetch as objects
                } else {
                    return $stm->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative arrays
                }
            }
        }
        return false; // If query failed or no data found
    }
    
    // Method for running INSERT, UPDATE, DELETE queries
    public function run($query, $data = array()) {
        $con = $this->connect();
        $stm = $con->prepare($query);
        
        if ($stm) {
            return $stm->execute($data); // Executes the query and returns the result (true/false)
        }
        return false; // If the query fails
    }
}
