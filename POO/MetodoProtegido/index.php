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
    /**
     * Link para documentação
     * https://www.php-fig.org/psr/
     * https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md
     * https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc-tags.md
     */
    require './Funcionario.php';
    require './Bonus.php';

    $funcionario = new Funcionario;
    $funcionario->nome = "Martin";
    $funcionario->salario = 3434.26;
    echo $funcionario->verSalario();
    //$funcionario->salarioConvertido; /*Atributo privado não pode ser acessado fora da classe */


    $funcBonus = new Bonus;
    echo $funcBonus->verBonus();

    ?>
</body>
</html>