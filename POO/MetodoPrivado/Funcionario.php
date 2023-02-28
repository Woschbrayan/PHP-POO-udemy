<?php 

class Funcionario
{
/**
 * Undocumented variable
 *
 * @var string $nome Um atributo que recebe o nome do funcionario
 * @var string $salario Um atributo que recebe o valor do salario do funcionario
 * @var string $salarioConvertido Um atributo privado que so pode ser acessado de dentro da classe.
 * @var string Funcionario::converterSalario Um metodo privado que so pode ser instanciado dentro da classe.
 */

    public string $nome;
    public float $salario;
    private string $salarioConvertido;

    public function verSalario(): string
    {
        return "O funcionario {$this->nome} tem o salário de R$ {$this->converterSalario()}";
    }

    private function converterSalario(): string 
    {
        $this->salarioConvertido = number_format($this->salario, '2', ',', '.');
        return $this->salarioConvertido;
    }
}
?>