<?php

namespace App\Model;

use App\Model\Generics\Actions;
use App\Model\Generics\Table;
use App\Model\Generics\PrimaryIndex;
use App\Model\Generics\Database;
use App\Model\Imodel;
use DateTime;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description Survey(enquete) model
 */

class Survey extends Actions implements Imodel
{
    private Database $databaseInstance;

    public function __construct(Database $DBinstance)
    {
        $this->databaseInstance = $DBinstance;
        $this->Mysqlconection = $this->databaseInstance->UP();
        $this->_Table = new Table(
            'en_survey',
            [
                "sur_name",
                "fk_status_id",
                "sur_start_d",
                "sur_end_D",
                "fk_usr_id"
            ],
            new PrimaryIndex('sur_id', 0)
        );
    }

    public function DestroyConection()
    {
        $this->Mysqlconection->close();
        $this->databaseInstance->DOWN();
    }
}