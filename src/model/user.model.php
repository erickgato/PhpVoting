<?php 
namespace App\Model;

use App\Model\Actions as Actions;
use App\Model\Table\Table as Table;
use App\Model\Table\PrimaryIndex;
use App\Model\Database as Database;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description User model for keep CRUD into controllers
 * 
 */
class User extends Actions {
    private Database $databaseInstance;

    public function __construct() {
        $this->databaseInstance = new Database() ;
        $this->Mysqlconection = $this->databaseInstance->UP();
        $this->_Table = new Table('en_user',["usr_name","usr_email","usr_pass"],new PrimaryIndex('usr_id',0));
    }

    public function __destruct()
    {
        $this->Mysqlconection->close();
    }
    
}