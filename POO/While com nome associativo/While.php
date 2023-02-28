<?php
$conn = $conexao_sql;

$sql = "SELECT id, nome, email 
		FROM usuarios 
		WHERE id = 1";

$result_usuarios = $conn->prepara($sql);
$result_usuarios->execute();

while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) { //O FETCH_ASSOC associa o campo do select como uma variavel, facilitando imprimir os campos com o echo.
	var_dump($row_usuario);
	extract($row_usuario);

	echo "ID: " . $id;
	echo "Nome: ". $nome;
	echo "E-mail: ". $email;
}