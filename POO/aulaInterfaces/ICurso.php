<?php

interface ICurso //a interface não implementa a regra, ela finaliza com ; (somente que determina o comportamento é a classe filha, mas a classe filha é obrigada a implementar o metodo que a classe pai[interface] esta indicando).
{
    public function disciplina(string $nomeDisciplina);
    public function professor(string $nomeProfessor);
    public function quantidadeAulas(int $quantidadeAulas);
}
?>