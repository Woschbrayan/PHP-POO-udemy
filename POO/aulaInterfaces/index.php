<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>

<body>
    <?php
    require './ICurso.php';
    require './CursoPosGraduacao.php';
    require './CursoGraduacao.php';

    $cursoPosGraduacao = new CursoPosGraduacao();
    echo $cursoPosGraduacao->disciplina("Desenvolvimento Web");
    echo $cursoPosGraduacao->quantidadeAulas("40") . "<br>";
    echo $cursoPosGraduacao->professor("Martinho Ramos");

    $cursoGraduacao = new CursoGraduacao();
    echo $cursoGraduacao->disciplina("Redes");
    echo $cursoGraduacao->quantidadeAulas("35") . "<br>";
    echo $cursoGraduacao->professor("Martin Correia");



    ?>
</body>

</html>