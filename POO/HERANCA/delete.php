<?php

session_start(); //inicia a sessão
ob_start(); //Limpa o buffer de saida

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); //Receber o id da URL
//var_dump($id);
if (!empty($id)) { //Verificar se o id possui valor
    //incluir arquivos
    require './Conn.php';
    require './User.php';

    //instanciar a classe e criar o objeto
    $deleteUser = new User();

    //Enviar o id para o atributo $id da classe User
    $deleteUser->id = $id;

    //Instanciar o metodo apagar
    $value = $deleteUser->delete();

    if($value){
        $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado!</p>"; 
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não apagado!</p>"; 
        header("Location: index.php");
    }

} else {
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não encontrado!</p>";

    header("Location: index.php");
}
