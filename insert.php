<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';

$json = file_get_contents('php://input');
$params = json_decode($json);
class insert {
  
    private $params;
    public function __construct($params) {
        $this->params = $params;
    }
   
    public function postData (){
        
        $conn = new connection;
        $conn->connection->query("insert into admin (nombre, correo, contrasena) 
        values ('$this->params->nombre','$this->params->correo','$this->params->contrasena')");

    }

}

$inse = new insert($params);

$inse->postData();

?>