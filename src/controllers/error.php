<?php
namespace App\Controllers;
class Error {
    function trow($data){
        echo "{$data['errcode']}";
    }
}