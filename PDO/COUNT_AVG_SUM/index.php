<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - AVG</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Média para nos cursos</h2>

    <?php

    //Com casa decimal
    $query_media_preco = "SELECT AVG(preco) AS media_preco 
                    FROM inscricoes_cursos
                    WHERE curso_id= 1";
    $result_media_preco = $conn->prepare($query_media_preco);
    $result_media_preco->execute();

    $row_media_preco = $result_media_preco->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_media_preco);
    extract($row_media_preco);
    echo "Média paga nos cursos: R$ " . number_format($media_preco, 2, ",", ".") . "<br>";



    //Sem casa decimal
    $query_media_preco_b = "SELECT format(AVG(preco), '#') AS media_preco_b
                        FROM inscricoes_cursos";
    $result_media_preco_b = $conn->prepare($query_media_preco_b);
    $result_media_preco_b->execute();

    $row_media_preco_b = $result_media_preco_b->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_media_preco_b);
    extract($row_media_preco_b);
    echo "Média paga nos cursos: R$ " . number_format($media_preco_b, 2, ",", ".") . "<br>";

    ?>

</body>

</html>