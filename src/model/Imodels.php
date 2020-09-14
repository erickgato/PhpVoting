<?php

namespace App\Model;

use App\Model\Generics\Database;

/**
 * @Description Represent a generic model format
 * @author Erick gato <a.itsbk0703@gmail.com>
 */
interface Imodel
{

    public function __construct(Database $DBinstance);

    public function DestroyConection();
    /**
     * @description insert a query into database, if sucess return last id inserted
     * @param $values array of values to insert 
     * @return int
     */
    // Insert any data to database
    public function INSERT(array $values);
    public function DELETE(int $id): bool;
    public function UPDATE(array $fields, array $values, int $id): bool;
    /**
     * @description search data from especific database table
     * @param string fileds, array where(you have to set key into 0 index and value into 1)
     * bool return number of lines( if false return associative array) 
     * string Joinclause to fetch data from multiple tables
     * @return array
     */
    public function SELECT(string $fieldstoselect, string $where = null, bool $nmlines = false, string $joinSQL = '');
}
