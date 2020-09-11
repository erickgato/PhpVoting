<?php
// Include the config file to setup env variables
include_once 'config/env.php';
require __DIR__ . '/vendor/autoload.php';
//Set UTF-8 as global encode
use App\Model\User as User;

$usr = new User();

var_dump($usr->SELECT('*'));
mb_internal_encoding('UTF-8');