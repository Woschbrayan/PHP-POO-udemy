<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="js/main.js">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body>
    <div class="header">
        <ul type="none" >
            <li> <a href="" style="color: white;"> Publico</a>          </li>
            <li> <a href="" style="color: white;"> Registro</a>         </li>
            <li> <a href="" style="color: white;"> Cadastro</a>         </li>
            <li> <a href="" style="color: white;"> Administrador</a>    </li>
            <li> <a href="" style="color: white;"> Cliente</a>          </li>
            <li> <a href="" style="color: white;"> Manuais</a>          </li>
        </ul>
    </div>

    <?php
    require'./Usuario.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if (!empty($formData['sendCadUser'])) {
        $usuario = new Usuario();
        $usuario->formData = $formData;
        $value = $usuario->cadastrarUsuario();
        var_dump($formData);

        if($value){
            isset($_SESSION['msg']);
            $msgError = $_SESSION['msg'];
            unset($_SESSION['msg']);           
        }else{
            isset($_SESSION['msg']);
            $msgError = $_SESSION['msg'];
            unset($_SESSION['msg']);     
        }

    }


    ?>

<div class="container_principal">
    <form action="" method="POST">
        <div class="grupo_input">
            <div class="title">
                <p style="font-size:30px; padding:2%;">Cadastro</p>
                <div class="error"> <span>
                    <?php
                    if(!empty($msgError)){
                        echo $msgError;
                    }
                
                    ?>
                </span></div>
            </div>
            <div class="cadusuario">
                <label for="">Nome:</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome">
                <label for="">E-mail:</label>
                <input type="text" class="form-control" placeholder="E-mail" name="email">
            </div>

            <div class="cadcontato">
                <div class="cpf">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" autocomplete="on">
                </div>
                <div class="telefone">
                    <label for="">Telefone</label>
                    <input type="tel" class="form-control" placeholder="(41) 0 0000-0000" name="telefone">
                </div>
                <div class="datanasc">
                    <label for="">Data de nascimento</label>
                    <input type="date" class="form-control" name="datanac">
                </div>
            
            
            </div>
        
        
        <div class="endereco">
            <p style="padding: 2%;">Endereço</p>
            
 
            <div class="casa">
                <label for="">Bairro :</label>
                <input type="text" class="form-control" placeholder="Bairro" name="endereco">
                <label for="">Rua :</label>
                <input type="text" class="form-control" placeholder="Rua" name="rua">
            </div>
            <div class="numestado">
                <div class="numero">
                    <label for="">Numero</label>
                    <input type="number" class="form-control" id="numero" placeholder="numero" name="numero">
                </div>
                <div class="estado">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado">
                </div>
                
            </div>
            <div class="senha">
                <label for="">Criar Senha:</label>
                <input type="password" id="senha" class="form-control" placeholder="******" name="senha" maxlength="6">
                <label for="">Comfirmar Senha:</label>
                <input type="password" id="senhaComfirm"class="form-control" placeholder="******" name="comfirm_senha" maxlength="6">
                <div class="errormsg">
                
                </div>
            </div>


            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <input type="submit" value="Cadastrar" class="btn btn-outline-primary " name="sendCadUser"></button>
                <input type="button" class="btn btn-outline-primary " value="Voltar" onClick="history.go(-1)"> 
              </div>
        </div>
    </form>
 
      
</div>


</body>
</html>
