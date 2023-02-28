<?php

//final class Cheque, não pode ser reescrito na classe filho. O mesmo é valido para metodos
abstract class Cheque
{
    ####PHP anterior ao 8.0
    // public float  $valor;
    // public string $tipo;

    // public function __construct(float $valor, string $tipo)
    // {
    //     $this->valor = $valor;
    //     $this->tipo = $tipo;
    // }
###  PHP a partir do 8.0
        public function __construct(public float $valor, public string $tipo)
        {
            
        }

        #Método abstrato
        #Todas as classes filhas são obrigadas a implementar este metodo
        abstract function calcularJuro();
    #Converter valor para real

    //final public function converterReal(float $valor): string,  não pode ser reescrito na classe filho
    public function converterReal(float $valor): string
    {
       return number_format($valor, '2', ',', '.');
    }
}