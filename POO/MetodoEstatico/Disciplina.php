<?php

class Disciplina
{
    //public string $aluno;
    //public float $notaTrabalho = 2;
    //public float $notaProva = 2;
    public static $media; //Atributo statico não faz parte do objeto, logo só é possivel utilizar com o self::

    /*function __construct(string $aluno, float $notaTrabalho, float $notaProva)
    {
        $this->aluno = $aluno;
        $this->notaTrabalho = $notaTrabalho;
        $this->notaProva = $notaProva;
        self::$media = $this->notaProva + $this->notaTrabalho;
    }*/
    function __construct(public string $aluno, public float $notaTrabalho = 2, public float $notaProva = 2)
    {
        self::$media = $this->notaProva + $this->notaTrabalho;
    }

    public function situacao()
    {
        if (self::$media >= 7) {
            return "Aluno(a) {$this->aluno} está <strong>aprovado</strong> com a média " . self::$media . "<hr>";
        } else {
            return "Aluno(a) {$this->aluno} está <strong>reprovado</strong> com a média " . self::$media . "<hr>";
        }
    }

    static function situacaoAluno(float $nota): string
    {
        if ($nota >= 7) {
            return "Aluno(a) está <strong>aprovado</strong> com a média " . $nota . "<hr>";
        } else {
            return "Aluno(a) está <strong>reprovado</strong> com a média " . $nota . "<hr>";
        }
    }
}
