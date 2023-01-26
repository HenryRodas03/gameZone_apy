<?php

include_once 'class/Connection/connection.php';

class select{

    
    public function getData($query){
        $conn = new connection;
        $results = $conn->connection->query($query);
        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }
        return $conn->convertUTF8($resultArray);
    }

    public function nonQuery($sqlstr){
        $conn = new connection;
        $results = $conn->connection->query($sqlstr);
        return $conn->connection->affected_rows;
    }

    //only for inserts, bring me the id
    public function nonQueryId($sqlstr){
        $conn = new connection;
        $results = $conn->connection->query($sqlstr);
         $filas= $conn->connection->affected_rows;
         if ($filas>=1) {
            return $conn->connection->insert_id;
         }else{
            return 0;
         }
    }

}

?>