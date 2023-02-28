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
    $query_contatos = "SELECT cont.id AS id_cont,
                            cont.telefone,
                            cont.celular,
                            usr.id AS id_usr,
                            usr.nome,
                            usr.email 
                        FROM 
                            contatos AS cont
                        RIGHT JOIN
                            usuarios AS usr ON usr.id=cont.usuario_id";

    $result_contatos = $conn->prepare($query_contatos);
    $result_contatos->execute();

    while($row_contato = $result_contatos->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_contato);
        extract($row_contato);
        echo "Id do contato: $id_cont <br>";
        echo "Telefone do contato: $telefone <br>";
        echo "Celular do contato: $celular <br>";

        echo "Id do usuário: $id_usr <br>";
        echo "Nome do usuário: $nome <br>";
        echo "E-mail do usuário: $email <br>";
        echo "<hr>";
    }

    ?>

</body>

</html>