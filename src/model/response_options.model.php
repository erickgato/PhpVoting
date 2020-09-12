<?php

namespace App\Model;

use App\Model\Actions;
use App\Model\Table\Table;
use App\Model\Table\PrimaryIndex;
use App\Model\Database;
use App\Model\Imodel;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description Response Options
 */

class ResponseOptions extends Actions implements Imodel
{
    private Database $databaseInstance;

    public function __construct(Database $DBinstance)
    {
        $this->databaseInstance = $DBinstance;
        $this->Mysqlconection = $this->databaseInstance->UP();
        $this->_Table = new Table('en_resp_options', ["fk_sur_id","ro_values","ro_votes"], new PrimaryIndex('ro_id', 0));
    }

    public function DestroyConection()
    {
        $this->Mysqlconection->close();
        $this->databaseInstance->DOWN();
    }
}
