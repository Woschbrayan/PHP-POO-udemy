<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Com LIMIT </h1>
<?php
require'./Conn.php';
$conectar = new Conn();
$conexao = $conectar->connectDb();

$querySql = "SELECT id,nome,email FROM usuario LIMIT 5";
$resultado = $conexao->prepare($querySql);
$resultado->execute();

while($row_usuario = $resultado->fetch(PDO::FETCH_ASSOC) ){
    //var_dump($row_usuario);
    extract($row_usuario);
    echo"ID: $id <br>";
    echo"Nome: $nome<br>";
    echo"email: $email<br>";
    echo"<hr>";
}
?>
<h1>Listar com LIMIT E OFFSET</h1>
<?php
$querySqlOffSet = "SELECT id,nome,email FROM usuario LIMIT 5 OFFSET 10";
$resultadoOffSet = $conexao->prepare($querySqlOffSet);
$resultadoOffSet->execute();

while($row_usuarioOffSet = $resultadoOffSet->fetch(PDO::FETCH_ASSOC) ){
    //var_dump($row_usuario);
    extract($row_usuarioOffSet);
    echo"ID: $id <br>";
    echo"Nome: $nome<br>";
    echo"email: $email<br>";
    echo"<hr>";
}



?>
</body>
</html>


