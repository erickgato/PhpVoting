<?php

namespace App\Controllers;

use App\Model\User as UserModel;
use App\Model\Imodel;
use App\Controllers\Types\UserType;
use App\Model\Generics\Database as DatabaseInstance;

class Login
{

    private Imodel $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel(new DatabaseInstance());
    }
    public function index()
    {
        if (!isset($_SESSION['LOGGED']))
            Login::getPage();
    }
    public function receiveData($data)
    {
        if (!(isset($data['user']['email']))  || !(isset($data['user']['password'])))
            Login::getPage();
        $result = $this->login(new UserType($data['user']['email'], $data['user']['password']));
        var_dump($result);
    }
    public static function getPage()
    {
        ob_start();
        require 'src/public/pages/login.php';
        $html = ob_get_contents();
        ob_end_clean();
        print $html;
    }
    public function login(UserType $User)
    {
        $DatabaseUser = $this->UserModel->SELECT('usr_pass', "usr_email = '{$User->email}' ");
        var_dump($DatabaseUser);
        if (!isset($DatabaseUser[0]['usr_pass']))
            return false;


        $cript = password_verify($User->password, $DatabaseUser[0]['usr_usr_pass']);
        if($cript)
            return true;
        else 
            return false;
    }
}
