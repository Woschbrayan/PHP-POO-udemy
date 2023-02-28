<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listar Usuarios Com LIKE</h1>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>
    <form action="" method="POST">
        <label for="">Pesquisar</label>
        <input type="text" name="search" placeholder="Pesquisar"><br><br>
        <input type="submit" name="pesquisar">
  </form>
    <?php
    

    require'./Conn.php';
    $conn = new Conn();
    $conect = $conn->connectDb();

 if (!empty($dados['search'])){
        try{
            $nome = $dados['search'];
            $queryUsuarioLike = "SELECT id, nome, email FROM usuario WHERE nome LIKE :nome ORDER BY id DESC" ;
            $resultQuery = $conect->prepare($queryUsuarioLike);
            $resultQuery->bindParam(':nome', $nome, PDO::PARAM_STR);
            $resultQuery->execute();

            if(!empty($resultQuery)){
                while($rowUsuario = $resultQuery->fetch(PDO::FETCH_ASSOC)){
                    extract($rowUsuario);
                    echo"ID: $id <br>";
                    echo "Nome: $nome <br>";
                    echo"Email: $email <br>";  
                    echo"<hr>";

                }
                }else{
                    echo"Error[10862]:Registro não encontrado";
                }

        }catch(Exception $e){
            echo"Error[10862]:Registro não encontrado";
        }
}
    
    ?>

    
</body>
</html>