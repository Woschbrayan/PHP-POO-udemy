<?php

abstract class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "poo";
    public int $port = 3306;
    public object $connect;

    public function connectDb()
    {
        try {
            // $this->connect = new PDO($this->db . ':host=' . $this->host . ";port=" . $this->port . "dbname=" . $this->dbname, $this->user, $this->pass);

            #conexao sem a porta
            $this->connect = new PDO($this->db . ':host=' . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);

            //echo "Conexão realizada com sucesso!";
            return $this->connect;
        } catch (Exception $erro) {
            die('Erro: Por favor tente novamente. Erro: 154448, Entre em contato com o administrador em contatomartin@outlook.com.');
            // echo "Erro: Por favor tente novamente. Erro: 154448, Entre em contato com o administrador em contatomartin@outlook.com.". .$erro->getMessage();
        }
    }
}
