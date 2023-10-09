<?php
require_once "../vendor/autoload.php";
require_once '../models/lib/Database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Password
{   
    private Object $mail;
    private Object $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'nicjmota5@gmail.com';
        $this->mail->Password = 'pygi ebta ytwf sazg';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
    }
    
    public function getToken() 
    {
        $length = 16; 
        $token = bin2hex(random_bytes($length)); 
        return $token;
    }
    public function verifyEmail($email)
    {
        
    }
    public function sendTokenEmail($toEmail)
    {   
        
        $token = $this->getToken();
        try {
            
            
            $this->mail->setFrom("pintaogrossao@gmail.com","pintao");
            $this->mail->addAddress('nicjmota2@gmail.com','suport');
            $this->mail->addReplyTo('nicjmota2@gmail.com','suport');
    
            $this->mail->isHTML(true);
            $this->mail->Subject = 'troca troca de senha';
            $this->mail->Body    = 'Para visualizar essa mensagem acesse http://localhost/projetopjt/views/newPasswordForm.php?token='.$token;
        
            //$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');
            if(!$this->mail->send()) {
                echo 'Não foi possível enviar a mensagem.<br>';
                echo 'Erro: ' . $this->mail->ErrorInfo;
            } else {
                echo 'Mensagem enviada.';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
      
    }
}
$p = new Password();
$p->sendTokenEmail('');