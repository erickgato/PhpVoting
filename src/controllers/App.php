<?php 
namespace App\Controllers;
use App\Controllers\LoginController;

class App {
    function login() {
        return header("Location: login");

    }
    function loggout() {
        session_destroy();
        $this->login();
    }
}