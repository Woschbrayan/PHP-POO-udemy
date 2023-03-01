<?php

namespace App\adms\Models\helper;

/**
 * Classe genérica para validar o e-mail
 *
 * @author Celke
 */
class AdmsValpassword
{
    /** @var string $password Recebe a senha que deve ser validada */
    private string $password;

    /** @var bool $result Recebe true quando executar o processo com sucesso e false quando houver erro */
    private bool $result;

    /**
     * @return bool Retorna true quando executar o processo com sucesso e false quando houver erro
     */
    function getResult(): bool
    {
        return $this->result;
    }
    public function validatePassword(string $password): void
    {
        $this->password = $password;

        if(stristr($this->password, "'"))
        {
            $_SESSION['msg'] ="<p style='color:#f00;'>Error: Caracter (') utilizado na senha invalido!</p>";

        }else{
            if(stristr($this->password, " "))
        {
            $_SESSION['msg'] ="<p style='color:#f00;'>Error: Proibido utilizar espaço em branco no camp senha invalido!</p>";
        
        }else{
            $this->valExtensPassword();
        }
        }
    }

    private function valExtensPassword()
    {
        if(strlen($this->password) <6){
            $_SESSION['msg'] ="<p style='color:#f00;'>Error:A senha deve ter no minimo 6 caracteres!</p>";
            $this->result = false;
        }else{
            $this->valValuePasword();
        }
    }

    private function valValuePasword():void
    {
        if(preg_match('/^(?=.*[0-9])(?=.*[a-zA-Z])[a-zA-Z0-9]{6,}$/', $this->password)){
            $this->result = true;
        }else{
            $_SESSION['msg'] ="<p style='color:#f00;'>Error:A senha deve ter Letras e numeros!</p>";
            $this->result = false;
        }    
    }

}
