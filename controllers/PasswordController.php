<?php 
require_once '../models/Password.php';
class PasswordController
{
    
    private Password $passwordModel;

    public function __construct() {
        $this->passwordModel = new Password();
    }

    public function sendTokenEmail($email)
    {
        return $this->passwordModel->sendTokenEmail($email);
    }
    public function changePassword($token,$newPassword)
    {
        return $this->passwordModel->changePassword($token,$newPassword);
    }
}

