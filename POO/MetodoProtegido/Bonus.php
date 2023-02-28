<?php

/**
 * A classe Bonus é classe filha da classe Funcionario
 * 
 * @author MArtinho
 */

class Bonus extends Funcionario
{
    /**
     * Método para ver o bônus
     *
     * @return string Retorna o bônus calculado
     */
    public function verBonus(): string
    {
        return "O funconario tem o bonus de R$ " . $this->bonusCalculado() . "<br>";
    }
    
}
