<?php

class ClientePessoaJuridica extends Cliente
{
    public $nomeFantasia;
    public $cnpj;

    public function verInformacaoEmpresa(): string
    {
        $dados = "Endereço da Empresa<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome: {$this->nomeFantasia}<br>";
        $dados .= "CNPJ: {$this->cnpj}<br>";

        return $dados;
    }
}
