<?php
class Conn
{
//Passando valores do banco de dados para realizar a conexão
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass= "";
    public string $dbname = "pooudemy";
    public int $port =  3306;
    public object $connect;

    public function  connectDb()
    {
        try{
//Conexão com o banco de dados
           $this->connect =  new PDO($this->db.':host='. $this->host. ';port=' .$this->port. ';dbname=' .$this->dbname, $this->user, $this->pass);
            return $this->connect;
            
//se a conexão não der certo exibe erro
        }catch(Exception $e){
            echo"Erro ao conectar com o Banco De Dados<br>";

            die('Error: Por favor tente de novo mais tarde!');
        }
    }



}