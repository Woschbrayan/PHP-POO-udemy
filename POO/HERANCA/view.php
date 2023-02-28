<?php
session_start();

ob_start();
//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar</title>
</head>

<body>
    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Detalhes do Usuário</h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if (!empty($id)) { //verificar se o id possui valor
        //incluir arquivos
        require './Conn.php';
        require './User.php';
        //instanciando a classe e criar o objeto
        $viewUser = new User();
        $viewUser->id = $id; //enviando o atributo para o objeto da classe
        $valueUser = $viewUser->view(); //instanciando o metodo visualizar
        //var_dump($valueUser);
        extract($valueUser);
        echo "ID: $id <br>";
        echo "Nome: $name <br>";
        echo "E-mail: $email <br>";
        echo "Data de Criação: " . date('d/m/Y H:i:s', strtotime($created)) . " <br>";
        echo "Data de Atualização:";
        if(!empty($modified)){ //so imprime a data se tiver valor no banco de dados.
          echo date('d/m/Y H:i:s', strtotime($modified));
        }
        echo "<br>";
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Usuário não encontrado!</p>";
        header('Location: index.php');
    }

    ?>
</body>

</html>
