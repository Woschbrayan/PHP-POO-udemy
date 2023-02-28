<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herança</title>
</head>

<body>
    <a href="index.php">Listar</a>
    <a href="create.php">Cadastrar</a>

    <h1>Cadastrar Usuários</h1>
    <?php
    
    require './Conn.php';
    require './User.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($formData);
    if (!empty($formData['SendAddUser'])) {
        //var_dump($formData);
        $createUser = new User();
        $createUser->formData = $formData;
        $value = $createUser->create();

        if ($value) {
            $_SESSION['msg'] = "<p style='color: green;'>Usúraio cadastrado com sucesso!</p>";
            isset($_SESSION['msg']);
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            //header("Location: index.php");
        } else {
            echo "<p style='color: red;'>Usúraio não cadastrado!</p>";
        }
    }

    $listUsers = new User();
    $result_users = $listUsers->list();
    foreach ($result_users as $row_user) {
        // var_dump($row_user);
        //extract($row_user); //estrai o campo da linha para otimizar e passar como variavel.
        // echo "ID: $id <br>";
        // echo "Nome: $name <br>";
        // echo "E-mail: $email <br>";
        // echo "
        // <hr>";
    }
    ?>
    <form name="CreateUser" method="post" action="">
        <label for="">Nome: </label>
        <input type="text" name="name" /><br> <br>
        <label for="">E-mail: </label>
        <input type="text" name="email" placeholder="Melhor e-mail" /> <br> <br>
        <input type="submit" value="Cadastrar" name="SendAddUser" />
    </form>

</body>

</html>