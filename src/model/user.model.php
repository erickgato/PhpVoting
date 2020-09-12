<?php

namespace App\Model;

use App\Model\Generics\Actions;
use App\Model\Generics\Table;
use App\Model\Generics\PrimaryIndex;
use App\Model\Generics\Database;
use App\Model\Imodel;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description User model
 * 
 */
class User extends Actions implements Imodel
{
    private Database $databaseInstance;

    public function __construct(Database $DBinstance)
    {
        $this->databaseInstance = $DBinstance;
        $this->Mysqlconection = $this->databaseInstance->UP();
        $this->_Table = new Table('en_user', ["usr_name", "usr_email", "usr_pass"], new PrimaryIndex('usr_id', 0));
    }

    public function DestroyConection()
    {
        $this->Mysqlconection->close();
        $this->databaseInstance->DOWN();   
    }
}
