<?php

namespace App\adms\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



/**
 * Classe genérica para enviar email
 *
 * @author Celke
 */
class AdmsSendEmail
{
    /** @var array $email Recebe informações do conteudo do email */
    private array $data;

     /** @var array $dataInfoEmail Recebe credenciais do e-mail */
    private array $dataInfoEmail;

    /** @var bool $result Recebe true quando executar o processo com sucesso e false quando houver erro */
    private bool $result;
    
    /**@var string $fromEmail recebe o email do remetente */
    private string $fromEmail;


    /** * @return bool Retorna true quando executar o processo com sucesso e false quando houver erro */
    function getResult(): bool
    {
        return $this->result;
    }

    public function sendEmail()
    {
        $this->dataInfoEmail['host'] = 'sandbox.smtp.mailtrap.io';
        $this->dataInfoEmail['fromEmail'] ="atendimento@celke.com.br";
        $this->dataInfoEmail['fromName'] = $this->dataInfoEmail['fromEmail'];
        $this->dataInfoEmail['username'] ="e04e36cd834e72";
        $this->dataInfoEmail['password'] ='ce9c26a3b56cf0';
        $this->dataInfoEmail['port'] =2525;

        $this->data['toEmail'] = "brayanwosch@gmail.com";
        $this->data['toName'] = "brayan";
        $this->data['subject'] = "confira e-mail" ;
        $this->data['contentHtml'] = "Olá <b>brayan</b><br><p>Cadastro realizado com suceesso!</p>";
        $this->data['contentText'] = "Olá brayan \n\nCadastro Realizado comsucesso";
        $this->sendEmailPhpMailer();
    }

    private function sendEmailPhpMailer():void
    {
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    
        $mail->CharSet = 'UTF-8';                
        $mail->isSMTP();                                          
        $mail->Host       = $this->dataInfoEmail['host'];                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $this->dataInfoEmail['username'];         
        $mail->Password   = $this->dataInfoEmail['password'];                             
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = $this->dataInfoEmail['port']; 

        $mail->setFrom($this->dataInfoEmail['fromEmail'], $this->dataInfoEmail['fromName']);
        $mail->addAddress($this->data['toEmail'] , $this->data['toName'] );

        $mail->isHTML(true);                                 
        $mail->Subject = $this->data['subject'];
        $mail->Body    = $this->data['contentHtml'];
        $mail->AltBody = $this->data['contentText'];
        
        $mail->send();

        $this->result = true;


    }
   
}
