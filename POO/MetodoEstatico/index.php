<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo Estatico</title>
</head>
<body>
    <?php 
    
    require './Disciplina.php';

    //echo "Media " . Disciplina::$media . "<br";
    $disciplina = new Disciplina("Martinho", 3.5, 1.0);
    echo $disciplina->situacao();

    //Acessar o metodo sem criar o objeto
    echo Disciplina::situacaoAluno(10.1);
    ?>
</body>
</html>