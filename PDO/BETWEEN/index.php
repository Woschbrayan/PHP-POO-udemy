<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Usuarios com BETWEEN</h1>

    <?php
    require'./Conn.php';

    $conn = new Conn();
    $conect = $conn->connectDb();

    $queryUsuario = "SELECT id, nome, email, niveis_acesso_id  FROM usuarios WHERE niveis_acesso_id IN (1,2)";
    $resultQuery = $conect->prepare($queryUsuario);
    $resultQuery->execute();
    
    while($rowUsuario = $resultQuery->fetch(PDO::FETCH_ASSOC)){
        extract($rowUsuario);
        echo"ID: $id <br>";
        echo "Nome: $nome <br>";
        echo"Email: $email <br>";  
        echo"ID nivel de acesso: $niveis_acesso_id <br>";
        echo"<hr>";

    }

?>
    
</body>
</html>