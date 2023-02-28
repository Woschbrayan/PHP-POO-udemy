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
        $query_usuarios = "SELECT usr.id, usr.nome, usr.email,
                            cont.telefone, cont.celular,
                            ende.logradouro, ende.numero, ende.bairro, ende.cidade
                            FROM usuarios AS usr
                            LEFT JOIN contatos AS cont ON cont.usuario_id=usr.id
                            LEFT JOIN enderecos AS ende ON ende.usuario_id=usr.id
                            ORDER BY usr.id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
            //var_dump($row_usuario);
            extract($row_usuario);
            echo "Id do usuário: $id <br>";
            echo "Nome do usuário: $nome <br>";
            echo "E-mail do usuário: $email <br>";

            echo "Telefone do usuário: $telefone <br>";
            echo "Celular do usuário: $celular <br>";

            echo "Logradouro do usuário: $logradouro <br>";            
            echo "Número do usuário: $numero <br>";            
            echo "Bairro do usuário: $bairro <br>";            
            echo "Cidade do usuário: $cidade <br>";

            echo "<hr>";
        }

    ?>

</body>

</html>
