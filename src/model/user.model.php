<?php 
namespace App\Model;

use App\Model\Actions as Actions;
use App\Model\Table\Table as Table;
use App\Model\Table\PrimaryIndex;
use App\Model\Database as Database;
class User extends Actions {
    private $databaseintance;
    public function __construct() {
        $this->databaseintance = new Database() ;
        $this->Mysqlconection = $this->databaseintance->UP();
        $this->_Table = new Table('en_user',["usr_name","usr_email","usr_pass"],new PrimaryIndex('usr_id',0));
    }
    public function __destruct()
    {
        $this->Mysqlconection->close();
    }
    
}