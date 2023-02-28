<?php

require './Conn.php';
class Usuario
{
    public string $nome;
    public string $email;
    public int $idade;

    public function cadastrar($nome, $idade, $email): string
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->idade = $idade;

        //exit();
        return "O usuario <strong>{$this->nome}</strong>com e-mail <strong>" . $this->email . "</strong> Cadastrado com sucesso! Idade {$this->idade}<br>";
    }
    public $connect;

    public function listar()
    {
        $conn = new Conn();
        $this->connect = $conn->conectar();

        $queryUsuario = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT 40";
        $resultUsuario = $this->connect->prepare($queryUsuario);
        $resultUsuario->execute();
        return $resultUsuario->fetchAll();

       // echo $resultUsuario;
    }
}
