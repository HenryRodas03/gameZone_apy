<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';

$json = file_get_contents('php://input');
$params = json_decode($json);
//return var_dump($params);
class insert {
  
    private $params;
    private $nombre;
    private $correo;
    private $contrasena;


    public function __construct($params) {
        $this->nombre = $params->nombre;
        $this->correo = $params->correo;
        $this->contrasena = $params->contrasena;
    }
   
    public function postData (){
        //return var_dump($this->params);
        $conn = new connection;
        $conn->connection->query("insert into admin (nombre, correo, contrasena) 
        values ('$this->nombre','$this->correo','$this->contrasena')")or die("Problemas en el selct: " . mysqli_error($conn->connection));

        return 1;
                
    }

}

$inse = new insert($params);

echo($inse->postData());

?>