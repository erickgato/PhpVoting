<?php

namespace App\Model\Generics;

use mysqli_result;
use mysqli;
use App\Model\Generics\Table;

/**
 * @Description Represents a crud action for each model in project
 * @Properties $Mysqlconection: MYSQLI object/ $_Table: table class instance
 * @author Erick gato <a.itsbk0703@gmail.com>
 */
abstract class Actions
{
    protected mysqli $Mysqlconection;
    public Table $_Table;
    /**
     * @description transform array to text with correct separation
     * @param $array to inplode and $delimiter to separate array
     * @return string
     */
    private function implodeArray(array $array, string $delimiter): string
    {

        $imploded = (count($array) > 1)  ? implode("'{$delimiter}'", $array) : implode("", $array);
        return $imploded;
    }
    /**
     * @description check that the SQL query was executed
     * @param $sql string code
     * @return bool
     */
    private function getResult(string $sql): bool
    {
        $result = $this->Mysqlconection->query($sql) ? true : false;
        if ((DEBUG) && (!$result)) {
            print("SQL ERROR: <br/> {$this->Mysqlconection->error} <br/> ");
            print("SQL Is: {$sql}<Br/>");
        }

        return $result;
    }
    /**
     * @description insert a query into database, if sucess return last id inserted
     * @param $values array of values to insert 
     * @return int
     * @note the first index is ignored because it is primary index and auto_increment
     */
    // Insert any data to database
    public function INSERT(array $values)
    {
        $RowData = $this->implodeArray($values, ',');
        $query = "INSERT INTO {$this->_Table->name} VALUES (null,'$RowData') ";
        $result = $this->getResult($query);
        if ($result)
            $result = $this->_Table->index->value = $this->Mysqlconection->insert_id;
        else 
            $result = false;

        return $result;
    }
    /**
     * @description Delete onde row from database
     * @param int $id
     * @return bool
     */
    public function DELETE(int $id): bool
    {
        $query = "DELETE FROM {$this->_Table->name} WHERE {$this->_Table->index->name} = $id";
        return $this->getResult($query);
    }
    /**
     * @description Update a row from database
     * @param array of values to update / $id to delimiter 
     */
    public function UPDATE(array $fields, array $values, int $id): bool
    {
        $table = $this->_Table;
        $update = ""; // intializes a update query syntax
        foreach ($fields as $key => $field) {
            if ($key == (count($fields) - 1)) {
                $update .= " $field = '$values[$key]' "; // ...lastupdate
            } else {
                $update .= " $field = '$values[$key]',"; // update1, update2, ...
            }
        }
        $sql = "UPDATE {$this->_Table->name} SET $update WHERE {$table->index->name} = {$id}";
        return $this->getResult($sql);
    }
    /**
     * @description search data from especific database table
     * @param string fileds, array where(you have to set key into 0 index and value into 1)
     * bool return number of lines( if false return associative array) 
     * string Joinclause to fetch data from multiple tables
     * @return array
     */
    public function SELECT(string $fieldstoselect, string $where = null, bool $nmlines = false, string $joinSQL = '')
    {
        $sql = '';
        $whereClause = '';

        if ($where != null)
            $whereClause = "WHERE $where "; // index 0 represents key, 1 represents value


        $sql = "SELECT {$fieldstoselect} FROM {$this->_Table->name} {$joinSQL} {$whereClause}";

        $result = $this->Mysqlconection->query($sql);
        if ($this->Mysqlconection->error)
            if (DEBUG)
                echo $this->Mysqlconection->error;


        if (($nmlines) && ($result !== false))
            return $this->SelectNumRows($result);

        else if ($result !== false)
            return $this->SelectAssoc($result);
        else return false;
    }
    /**
     * @description especific for select method fetch result to asociative array
     * @param mysqli_result for fetch
     * @return array
     */
    private function SelectAssoc(mysqli_result $result)
    {
        $assocresult = [];
        $index = 0;
        if ($result == false)
            return false;
        while ($line = $result->fetch_assoc()) {
            $assocresult[$index] = $line;
            $index++;
        }
        return $assocresult;
    }
    /**
     * @description select the number of rows from a query 
     * @param mysqli_result
     * @return int
     */
    private function SelectNumRows(mysqli_result $resultquery)
    {
        echo "Count starting";
        $nmrows = mysqli_num_rows($resultquery);
        var_dump($nmrows);
        return $nmrows;
    }
}
