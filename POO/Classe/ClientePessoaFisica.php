<?php

class ClientePessoaFisica extends Cliente
{
    #atributo com tipagem
    public string $nome;
    public int $cpf;


    #metodo
    public function verInformacaoUsuario(): string
    {
        $dados = "Endereço da pessoa fisica<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome: {$this->nome}<br>";
        $dados .= "CPF: {$this->cpf}<br>";
        
        return $dados;
    }
}