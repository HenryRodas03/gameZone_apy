<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';

class select{

    
    public function getData(){
        $conn = new connection;
        $results = $conn->connection->query("select * from admin where status=0");
        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }
        return $conn->convertUTF8($resultArray);
    }
}

$select = new select;

print_r(json_encode($select->getData()));

?>