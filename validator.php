<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';
$json = file_get_contents('php://input');
$params = json_decode($json);
class validate{

    private $correo; 
    private $contrasena;
    public function __construct($params){
        $this->correo = $params->correo;
        $this->contrasena = $params->contrasena;
    }
    public function validate(){
        $conn = new connection;
        $result= $conn->connection->query("select * from admin where correo='$this->correo' and contrasena='$this->contrasena'");
        $filas = $result->fetch_all(MYSQLI_ASSOC);
       // Verificar si hay filas o no
           if (empty($filas)) {
            return 0;
        } else {
            return 1;
        }
    }
   
}
$res = new validate($params);

$response = array("resultado" => "");

if ($res->validate()==1) {
    $response['resultado'] = "OK";
}


  echo json_encode($response); 

?>