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

mb_internal_encoding('UTF-8');

require_once './src/public/index.php';
