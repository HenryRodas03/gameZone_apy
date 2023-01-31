<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

include_once 'class/Connection/connection.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

class insert {
  
    private $params;
    private $nombre;

    private $id;
    private $correo;
    private $contrasena;


    public function __construct($params) {
        $this->nombre = $params->nombre;
        $this->correo = $params->correo;
        $this->contrasena = $params->contrasena;
        $this->id = $params->id;
    }
   
    public function updateData (){
        $conn = new connection;
        $conn->connection->query("UPDATE admin
        SET nombre = '$this->nombre', correo = '$this->correo',contrasena= '$this->contrasena' 
        WHERE id = $this->id;")or die("Problemas en el update: " . mysqli_error($conn->connection));

        return 1;
                
    }

}

$res = new insert($params);

$response = array("resultado" => "", "mensaje" => "");

if ($res->updateData()==1) {
    $response['resultado'] = "OK";
    $response['mensaje'] = "datos modificados";
}


  echo json_encode($response); 

?>