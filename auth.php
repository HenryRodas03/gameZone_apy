<?php
require_once 'class/auth.class.php';
require_once 'class/answers.class.php';

$_auth = new auth;
$_answers = new answers;



if($_SERVER['REQUEST_METHOD']== "POST"){

    $postBody = file_get_contents("php://input");
    print_r($postBody);

}else{
    echo "metodo no permitido";
}

?>