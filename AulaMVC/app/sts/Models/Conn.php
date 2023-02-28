<?php

namespace Sts\Models;

use Exception;
use PDO;

abstract class Conn
{
    private string $db = "mysql";
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "POO";
    private int $port = 3306;
    private object $connect;

    public function connectDb(): object
    {
        try{
            # Conexão com a porta
            // $this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            # Conexão sem a porta
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
            //echo "Conexão realizada com sucesso<br>";
            return $this->connect;
        } catch (Exception $erro){
            die('Erro: Por favor tente novamente. Caso o problema percista, entre em contato com o administrador em admi@empresa.com.br  COD: 197.');
        }
    }
}