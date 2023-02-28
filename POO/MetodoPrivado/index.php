<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método Privado</title>
</head>
<body>
    <?php 
    
    require './Funcionario.php';

    $funcionario = new Funcionario();
    $funcionario->nome = "Martin";
    $funcionario->salario = 3434.26;
    echo $funcionario->verSalario();
    //$funcionario->salarioConvertido; /*Atributo privado não pode ser acessado fora da classe */
    ?>
</body>
</html>