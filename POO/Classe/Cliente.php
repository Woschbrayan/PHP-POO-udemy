<?php

class Cliente
{
    #atributos
    public string $logradouro;
    public string $bairro;
    #metodo
    public function verEndereco() : string{
        return "<p>Endereço: {$this->logradouro}<br>Bairro: {$this->bairro}</p>";
    }

}