<?php
// Include the config file to setup env variables
include_once 'config/env.php';
require __DIR__ . '/vendor/autoload.php';
//Set UTF-8 as global encode
use App\Model\User;
use App\Model\Status;
use App\Model\Imodel;
use App\Model\Survey;
use App\Model\Generics\Database;

$conection = new Database();
function CreateModel(Imodel $model)
{
    return $model;
}

$usr = CreateModel(new User($conection));
$stts = CreateModel(new Status($conection));
$sur = CreateModel(new Status($conection));


mb_internal_encoding('UTF-8');
