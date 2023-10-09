<?php 
require_once '../models/Password.php';
class PasswordController
{
    
    private Object $passwordModel;

    public function sendTokenEmail($email) : bool
    {
        return $this->passwordModel->sendTokenEmail();
    }
}

$u = new PasswordController();
$u->sendTokenEmail('');