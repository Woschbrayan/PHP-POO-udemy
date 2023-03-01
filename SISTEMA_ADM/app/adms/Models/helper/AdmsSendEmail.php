<?php

namespace App\adms\Models\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\Test\PHPMailer\IsValidHostTest;

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

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;

    /**@var int $optionConfEmail recebe o id do email que sera utilixado para enviar o email */
    private int $optionConfEmail;



    /** * @return bool Retorna true quando executar o processo com sucesso e false quando houver erro */
    function getResult(): bool
    {
        return $this->result;
    }

    function getDromEmail(): bool
    {
        return $this->result;
    }

    public function sendEmail(int $optionConfEmail): void
    {
        // $this->dataInfoEmail['host'] = 'sandbox.smtp.mailtrap.io';
        // $this->dataInfoEmail['fromEmail'] ="atendimento@celke.com.br";
        // $this->dataInfoEmail['fromName'] = $this->dataInfoEmail['fromEmail'];
        // $this->dataInfoEmail['username'] ="e04e36cd834e72";
        // $this->dataInfoEmail['password'] ='ce9c26a3b56cf0';
        // $this->dataInfoEmail['port'] =2525;

        $this->optionConfEmail = $optionConfEmail;
        $this->data['toEmail'] = "brayanwosch@gmail.com";
        $this->data['toName'] = "brayan";
        $this->data['subject'] = "confira e-mail" ;
        $this->data['contentHtml'] = "Olá <b>brayan</b><br><p>Cadastro realizado com suceesso!</p>";
        $this->data['contentText'] = "Olá brayan \n\nCadastro Realizado comsucesso";
        $this->infoPhpMailer();
    }

    private function infoPhpMailer():void
    {
        $confEmail = new \APP\adms\Models\helper\AdmsRead();
        $confEmail->fullRead("SELECT * FROM adms_confs_emails WHERE id= :id LIMIT :limit", "id=1&limit=1");
      
        $this->resultBd = $confEmail->getResult();
   
        if($this->resultBd){
           
            
            $this->dataInfoEmail['host']      = $this->resultBd[0]['host'];
            $this->dataInfoEmail['fromEmail'] = $this->resultBd[0]['email'];
            $this->fromEmail = $this->dataInfoEmail['fromEmail'];
            $this->dataInfoEmail['fromName']  = $this->resultBd[0]['name'];
            $this->dataInfoEmail['username']  = $this->resultBd[0]['username'];
            $this->dataInfoEmail['password']  = $this->resultBd[0]['password'];
            $this->dataInfoEmail['smtpsecure']  = $this->resultBd[0]['smtpsecure'];
            $this->dataInfoEmail['port']      = $this->resultBd[0]['port'];
            $this->sendEmailPhpMailer();
        }else{
            $this->result = false;
        }
    }


    private function sendEmailPhpMailer():void
    {

        try{
        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;    
        $mail->CharSet = 'UTF-8';                
        $mail->isSMTP();                                          
        $mail->Host       = $this->dataInfoEmail['host'];                    
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $this->dataInfoEmail['username'];         
        $mail->Password   = $this->dataInfoEmail['password'];                             
        $mail->SMTPSecure = $this->dataInfoEmail['smtpsecure'];       
        $mail->Port       = $this->dataInfoEmail['port']; 

        $mail->setFrom($this->dataInfoEmail['fromEmail'], $this->dataInfoEmail['fromName']);
        $mail->addAddress($this->data['toEmail'] , $this->data['toName'] );

        $mail->isHTML(true);                                 
        $mail->Subject = $this->data['subject'];
        $mail->Body    = $this->data['contentHtml'];
        $mail->AltBody = $this->data['contentText'];
        
        $mail->send();

        $this->result = true;
        }catch(\Exception){
            $this->result = false;
        }

    }
   
}
