<?php
header('Access-Control-Allow-origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

include_once 'class/Connection/connection.php';
include_once 'select.php';

$selectu = new select;

//$query = "insert into admin (nombre, correo, contraseña) values ('Juan','prueba4@gmail','1234')";
//print_r($selectu->nonQueryId($query));

?>


hola index
