<?php


//require_once "../vendor/autoload.php";
require_once '../models/lib/Database.php';
require_once '../models/User.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Password
{   
    private PHPMailer $mail;
    private User $userModel;
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->userModel = new User();
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'nicjmota5@gmail.com';
        $this->mail->Password = 'pygi ebta ytwf sazg';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
    }
    
    public function genToken() 
    {
        $length = 16; 
        $token = bin2hex(random_bytes($length)); 
        return $token;
    }
    public function sendTokenEmail($toEmail)
    {   
        
       
        if($this->userModel->findUserByEmail($toEmail))
        {   
            $token = $this->genToken();
            $expFormat = mktime( date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
            $expDate = date('Y-m-d H:i:s' , $expFormat);
            $this->db->insert("password_recovery",['email','token','expDate'],[$toEmail,$token,$expDate]);

            try {       
              
                $this->mail->setFrom("pintaogrossao@gmail.com","pintao");
                $this->mail->addAddress($toEmail,'suport');
                $this->mail->addReplyTo($toEmail,'suport');
        
                $this->mail->isHTML(true);
                $this->mail->Subject = 'troca troca de senha';
                $this->mail->Body    = 'Para visualizar essa mensagem acesse http://localhost/projetopjt/views/newPasswordForm.php?token='.$token;
            
                //$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');
                if(!$this->mail->send()) {
                    return false;
                } else {
                    return true;
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        
        }else
        {
            return false;
        }
    }
    public function verifyToken($token) 
    {
        $res = $this->db->select("password_recovery",['token'],['token','=',$token]);
        if($res)
        {
            return true;
        }else
        {
            return false;
        }

    }
    public function getEmailByToken($token) 
    {
        $res = $this->db->select("password_recovery",['email'],['token','=',$token]);
        if(!$res)
        {
            return false;
        }else
        {   
        
            $email = $res[0]['email'];
          
            return $email;
        }
        
    }
    public function changePassword($token,$newPassword)
    {
        if($this->verifyToken($token))
        {
            $email = $this->getEmailByToken($token);
            $this->userModel->changePassword($email,$newPassword);
        }
    }

    
}
