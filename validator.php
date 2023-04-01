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
            $resultArray = array();
            foreach ($result as $key) {
                $resultArray[] = $key;
            }
         return $resultArray;
        }
    }
   
}
$res = new validate($params);

$response = array("status" => "","role"=>"");

$result= $res->validate() ;

if ($res->validate()!=0) {
    $response['status']=true;
    $response['role']=$result[0]['role'];
    
}else{
    $response['status']=false;
    
}

print_r(json_encode($response));

 

?>