<?php
session_start(); //inicia a sessão
ob_start(); //para fazer o redirecionamento na sessão

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //Receber o id do usuario
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Editar o Usuário</h1>
    <?php
    if (isset($_SESSION['msg'])) { //verificar a mensagem no campo da sessão
        echo $_SESSION['msg'];
        unset($_SESSION['msg']); //destroi o campo na sessão
    }
    //incluir arquivos
    require './Conn.php';
    require './User.php';

    //Receber os dados do formulario
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT); //filtra os dados do formulario e coloca em string
    //var_dump($formData);


    if (!empty($formData['SendEditUser'])) { //verifica se o usuario clicou no botão atraves do campo
        //var_dump($formData);
        $editUser = new User(); //instancia a classe e cria o objeto
        $editUser->formData = $formData; //envia os dados do atributo para o objeto da classe
        $value = $editUser->edit(); //instancia o metodo e recede o retorno boolean

        if ($value) { //verificar se o retorno do metodo é true
            $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
            header('Location: index.php');
        } else { //se o retorno do metodo for false
            echo "<p style='color: red;'>Usuário não editado!</p>";
        }
    }

    if (!empty($id)) { //verificar se o id possui valor

        $viewUser = new User(); //instanciando a classe e criar o objeto
        $viewUser->id = $id; //enviando o atributo para o objeto da classe
        $valueUser = $viewUser->view(); //instanciando o metodo visualizar
        extract($valueUser); //extrai os campos do array como variaveis
        //var_dump($valueUser);
    ?>
        <form name="EditUser" method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label for="">Nome: </label>
            <input type="text" name="name" placeholder="Nome Completo" value="<?php echo $name; ?>" required />
            <br><br>

            <label for="">E-mail: </label>
            <input type="text" name="email" placeholder="Melhor e-mail" value="<?php echo $email; ?>" required />

            <input type="submit" value="Editar" name="SendEditUser" />
        </form>
    <?php

    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Usuário não encontrado!</p>";
        header('Location: index.php');
    }

    ?>
</body>

</html>