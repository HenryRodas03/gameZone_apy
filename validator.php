<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';
$json = file_get_contents('php://input');
$params = json_decode($json);
class validate{

    private $email; 
    private $password;
    public function __construct($params){
        $this->email = $params->email;
        $this->password = $params->password;
    }
    public function validate(){
        $conn = new connection;
        $result= $conn->connection->query("select * from admin where email='$this->email' and password='$this->password' and status=0");
        $rows = $result->fetch_all(MYSQLI_ASSOC);
       // Check if there are rows
           if (empty($rows)) {
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