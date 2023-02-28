<?php
require './Conn.php';
class Usuario extends Conn
{
    //usuario
    public string $nome;
    public int $codigo;
    public int $cpf;
    public string $email;
    public string $senha;

    //rebendo array
    public object $conn;
    public array $formData;

    //endereços
    public string $rua;
    public string $endereco;
    public int $numero;
   
    

    public function verificarLogin() : bool
    {
      $this->conn = $this->conectar();
      $senhaHash = $this->formData['senha'];
      
    
      //SQL para verificar senha/login 
          $sql_usuario = "SELECT 
                            id_usuario,
                            nome_usuario,
                            email,
                            cpf,
                            senha
                        FROM 
                            usuario 
                        WHERE 
                            email = '{$this->formData['email']}'";


    //Estanciando class de conexão para executar o sql
        $result_usuariuos = $this->conn->prepare($sql_usuario);
        $result_usuariuos->execute();
      
     
    //Verificando Se existe ou não o Login   
        if($result_usuariuos->rowCount()){
            $row = $result_usuariuos->fetchALL();
            $senhaHashBD =  $row[0][4];
            $emailVerify = true;
        }
        else{
            
            $senhaHashBD = null;
            $emailVerify =  false;
        }

        if(password_verify($senhaHash, $senhaHashBD) and $emailVerify = true){
            return true;
        }
        else{
            return false;

        }
    }

    //Function cadastro de um novo usuario 
        public function cadastrarUsuario() : bool
        {
            $verificar_sql = "SELECT 
                                id, 
                                nome,
                                email
                            FROM 
                                usuario
                            WHERE 
                                email = '{$this->formData['email']}' ";

                                    $this->conn = $this->connectDb();
                                    $sql_usuario = $this->conn->prepare($verificar_sql);
                                    $sql_usuario->execute();

                if($sql_usuario->rowCount()){
                    $_SESSION['msg'] = "<p style='color: red;font-size:inherit;'>Usuario Ja Registrado no Sistema!</p>";
                    return false;        
                    
                }elseif($this->formData['senha'] == null){

                    $_SESSION['msg'] = "<p style='color: red;font-size:inherit;'>Campo senha obrigatorio!</p>";
                    return false; 

                }elseif($this->formData['senha'] != $this->formData['comfirm_senha']){

                    $_SESSION['msg'] = "<p style='color: red;font-size:inherit;'>Comfirmação de senha Erro!</p>";
                    return false; 
                }
                
            
                else{
                   
                    //Sql para inserir o Usuario no DataBase

                    $senhaHash = $this->formData['senha'];
                    $senhaHash = password_hash($senhaHash, PASSWORD_DEFAULT);

                    $sql_cadastrar = "INSERT INTO
                                        usuario
                                        (id,
                                        nome,
                                        email,
                                        created)
                                VALUES 
                                    (DEFAULT,
                                    '{$this->formData['nome']}',
                                    '{$this->formData['email']}',
                                    NOW())";

                //Estanciando class de conexão para executar o sql
                    $this->conn = $this->connectDb();
                    $insert_usuario = $this->conn->prepare($sql_cadastrar);
                    $insert_usuario->execute();
                    $_SESSION['msg'] = "<p style='color: green;font-size:inherit;'>Usuario Cadastrado com sucesso!</p>";
                    return true;

                }
                


                
                 
        }





    }
