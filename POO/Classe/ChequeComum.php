<?php

class ChequeComum extends Cheque
{
    public function calcularJuro(): string
    {   
        $valorcomJuro = (0.20 * $this->valor) + $this->valor; // 1 = 100%, 0.5 = 50%
        #Com parent, a classe filha Cheque comum esta herdando o metodo da classe pai Cheque. Assim estamos utilizando o mesmo codigo em locais diferentes.
        //$valorConverteReal = parent::converterReal($this->valor);

        #Com pseudo Classe, a classe filha Cheque comum esta herdando o metodo da classe pai Cheque. Assim estamos utilizando o mesmo codigo em locais diferentes.
        
        $valorConverteReal = $this->converterReal($valorcomJuro);

        return "Valor do cheque é R$ {$this->converterReal($this->valor)} com o juros fica R$ {$valorConverteReal} de tipo {$this->tipo} <br>";
    }

}