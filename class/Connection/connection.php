<?php

class connection
{

    private $server;
    private $user;
    private $pass;
    private $database;
    private $port;
    public $connection;

    function __construct()
    {
        $listdata = $this->connecData();
        foreach ($listdata as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->pass = $value['pass'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->connection = new mysqli($this->server, $this->user, $this->pass, $this->database, $this->port);
        if ($this->connection->connect_errno){
            die("Error en la conexion");
        }
    }

    private function connecData()
    {
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }
    

}

?>