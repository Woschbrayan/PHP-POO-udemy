<?php

class Conn
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "POO";
    public $port = 3306;
    public $connect = null;

    public function conectar(){
        try{
            $this->connect = new PDO("mysql:host=". $this->host . ";port=" . $this->port .";dbname=" . $this->dbname, $this->user, $this->pass);
            //echo "Conexão realizada com sucesso!";
            return $this->connect;
        }catch(Exception $erro){
            echo "Conexão com o banco de dados não realizado com sucesso: " .$erro->getMessage();
            return false;
        }
    }
}