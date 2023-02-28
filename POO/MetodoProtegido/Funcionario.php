<?php
/**
     * A classe Funcionario calcula o salário do colaborador
     * @author Martinho <contatomartin@outlook.com> 
     */
class Funcionario
{
    public string $nome; /** @var string $nome Um atributo que recebe o nome do colaborador */
    public float $salario;/** @var string $salario Um atributo que recebe o valor do salario do colaborador */
    private string $salarioConvertido;/** @var string $salarioConvertido Um atributo privado que so pode ser acessado de dentro da classe. Recebe o salario convertido de salario */
    protected float $bonus = 2500.02; /** @var string $bonus atributo protegido somente pode ser acessado pela classe e pela classe filha. O mesmo vale para metodo protegido. */

    /**
     * Criar a frase com o nome e o salario do colaborador 
     *
     * @return string Retorna a frase com o nome e o salario do colaborador
     */
    public function verSalario(): string
    {
        return "O funcionario {$this->nome} tem o salário de R$ {$this->converterSalario($this->salario)}<br>";
    }
    /**
     * Recebe o salário e retorna convertido para R$
     * Método privado, somente pode ser chamado na classe
     *
     * @param float $valor Deve ser enviado um parametro numerico
     * @return string Retorna o valor convertido para R$
     */
    private function converterSalario(float $valor): string
    {
        $this->salarioConvertido = number_format($valor, '2', ',', '.');
        return $this->salarioConvertido;
    }

    /**
     * Método protegido, somente pode ser chamado na classe ou na classe filha
     *
     * @return string Retorna o bônus
     */
    protected function bonusCalculado(): string
    {
        return $this->converterSalario($this->bonus);
    }
}
