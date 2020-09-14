<?php

namespace App\Controllers;

use App\Model\User as UserModel;
use App\Model\Imodel;
use App\Model\Generics\Database as DatabaseInstance;

class SingUp
{

    private Imodel $UserModel;
    
    public function __construct()
    {
        $this->UserModel = new UserModel(new DatabaseInstance());
    }
    public function index()
    {
        if (!isset($_SESSION['LOGGED']))
            SingUp::getPage();
    }
    public function receiveData($data){
        $this->Create($data['user']['name'], $data['user']['email'], $data['user']['password']);
        header('Location: login');
    }
    public static function getPage()
    {
        return require 'src/public/pages/sing-up.php';
    }
    public function Create(string $name, string $email, string $password)
    {

        $key = password_hash($password, PASSWORD_DEFAULT);
        $Insert = $this->UserModel->Insert([$name, $email, $key]);
        if (is_int($Insert))
            return true;
        else
            return false;
    }
}
