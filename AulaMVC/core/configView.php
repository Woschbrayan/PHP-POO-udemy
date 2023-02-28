<?php

namespace Core;

class configView
{
    # Antes do PHP 8
    // private string $nome;
    // private array $dados;

    // public function __construct(string $nome, array $dados)
    // {
    //     $this->nome = $nome;
    //     $this->dados = $dados;
    //     //var_dump($nome);
    //     //var_dump($dados);
    // }
    # A partir do PHP 8.

    public function __construct(private string $nome, private array $dados)
    {
        //var_dump($nome);
        //var_dump($dados);
    }


    public function renderiza()
    {
        if(file_exists('app/'. $this->nome . '.php')){
            include 'app/'. $this->nome . '.php';
        }else{
            echo "Erro: Por favor tente novamente. Caso problema persista, entre em contato com o administrador. COD: 2154";
        }
    }
}
