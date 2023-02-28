<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Listar Usuários</h2>

    <?php
    //WHERE usr.nome LIKE '%a%'

    $query_usuarios = "SELECT usr.id AS id_usr, usr.nome AS nome_usr, usr.email,
                    sit.id AS id_sit, sit.nome AS nome_sit,
                    niv.id AS id_niv, niv.nome AS nome_niv
                    FROM usuarios AS usr
                    INNER JOIN sists_usuarios AS sit ON sit.id=usr.sists_usuario_id
                    INNER JOIN niveis_acessos AS niv ON niv.id=usr.niveis_acesso_id 
                    ORDER BY usr.id DESC                    
                    LIMIT 40";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID do usuário: $id_usr <br>";
        echo "Nome do usuário: $nome_usr <br>";
        echo "E-mail do usuário: $email <br>";
        echo "Id da situação do usuário: $id_sit <br>";
        echo "Nome do situação do usuário: $nome_sit <br>";
        echo "Id do nível de acesso do usuário: $id_niv <br>";
        echo "Nome do nível de acesso do usuário: $nome_niv <br>";
        echo "<hr>";
    }
    ?>

</body>

</html>