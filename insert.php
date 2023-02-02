<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

include_once 'class/Connection/connection.php';

$json = file_get_contents('php://input');
$params = json_decode($json);
//return var_dump($params);
class insert {
  
    private $params;
    private $name;
    private $email;
    private $password;


    public function __construct($params) {
        $this->name = $params->name;
        $this->email = $params->email;
        $this->password = $params->password;
    }
   
    public function postData (){
        //return var_dump($this->params);
        $conn = new connection;
        $conn->connection->query("insert into admin (name, email, password) 
        values ('$this->name','$this->email','$this->password')")or die("Problemas en el selct: " . mysqli_error($conn->connection));

        return 1;
                
    }

}

$res = new insert($params);

$response = array("resultado" => "", "mensaje" => "");

if ($res->postData()==1) {
    $response['resultado'] = "OK";
    $response['mensaje'] = "datos ingresados";
}


  echo json_encode($response); 

?>