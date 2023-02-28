<?php

class ChequeEspecial extends Cheque
{
    public function calcularJuro(): string
    {
        $valorCoJuro = (0.20 * $this->valor) + $this->valor;
        $convertReal = $this->converterReal($valorCoJuro);

        return "Valor do cheque especial R$ {$this->converterReal($this->valor)} e com juros é R$ {$convertReal} de tipo {$this->tipo} <br>";
    }
}