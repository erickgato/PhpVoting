<?php 
namespace App\Controllers;
use App\Controllers\LoginController;

class App {
    function login() {
        echo "Login works!";
    }
    function explore() {
        echo "Browse Works";
    }
    function survey($data) {
        var_dump($data);
    }
}