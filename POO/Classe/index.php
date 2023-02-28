<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe e Objeto</title>
</head>

<body>
    <?php
    #inclui o arquivo
    require './Usuario.php';
    require './Cliente.php';
    require './ClientePessoaFisica.php';
    require './ClientePessoaJuridica.php';
    #instancia a classe
    // $usuario = new Usuario();
    #cria o objeto
    // $msg = $usuario->cadastrar("Martin", 10, "martin@teste.com.br");

    // echo $msg;
    #instancia a classe
    // $listarUsuario = new Usuario();
    // #cria o objeto
    // $resultUsuarios = $listarUsuario->listar();

    // foreach ($resultUsuarios as $rowUsuario) {
    //     //extract($rowUsuario);
    //     extract($rowUsuario);
    //     echo "Id do Usuario $id <br>";
    //     echo "Id do Usuario $nome <br>";
    //     echo "Id do Usuario $email <br>";
    //     echo "<hr>";
    // }
    #imprimindo retorno
    // echo $resultUsuarios;

    #classe pai, tipagem
    // $cliente = new Cliente();
    // $cliente->logradouro = "Avenida Brasil";
    // $cliente->bairro = "Capão Raso";
    // $msg = $cliente->verEndereco();
    // echo $msg;
    // echo "<hr>";
    // #Classe filha
    // $clientePf = new ClientePessoaFisica();
    // $clientePf->logradouro = "Avenida Winston";
    // $clientePf->bairro = "Capão da Imbuia";
    // $clientePf->nome = "Anderson";
    // $clientePf->cpf = "02317520590";

    // $msgpf = $clientePf->verInformacaoUsuario();

    // echo $msgpf . "<hr>";
    #classe filha
    // $empresa = new ClientePessoaJuridica();
    // $empresa->logradouro = "Av Candido";
    // $empresa->bairro = "Centro Civico";
    // $empresa->nomeFantasia = "Canal Licita";
    // $empresa->cnpj = "42855499000101";

    // $msgEmpresa = $empresa->verInformacaoEmpresa();

    // echo $msgEmpresa;


    #classe abstrata
    require './Cheque.php';
    require './ChequeComum.php';
    require './ChequeEspecial.php';

    //A classe abstrata não pode ser instanciada
    // $cheque = new Cheque(207.27, "Comum");
    // $msg = $cheque->verValor();

    // echo $msg ."<hr>";
    
    $chequeComum = new ChequeComum(307225.65, "comum");
    $msgComum = $chequeComum->calcularJuro();
    
    echo $msgComum."<hr>";

    $chequeEspecial = new ChequeEspecial(455.66, "Especial");
    $msgEspecial = $chequeEspecial->calcularJuro();

    echo $msgEspecial . "<hr>";

    ?>
</body>

</html>