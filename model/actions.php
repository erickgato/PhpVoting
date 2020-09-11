<?php

abstract class ACTIONS
{
    protected mysqli $Mysqlconection;

    // transform array to text with correct separation 
    private function implodeArray(array $array, string $delimiter) : string
    {
        $imploded = (count($array) > 1)  ? implode("'{$delimiter}'", $array) : implode("", $array);
        return $imploded;
    }

    private function getResult($sql) : bool {
        $result = $this->Mysqlconection->query($sql) ? true : false;
        return $result;
    } 
    // Insert any data to database
    protected function INSERT(string $table, array $values)
    {
        $RowData = $this->implodeArray($values, ',');
        $query = "INSERT INTO {$table} VALUES $RowData ";
        return $this->getResult($query);
    }
    protected function DELETE(string $table, string $indexname, int $delimiter)
    {
        $query = "DELETE FROM {$table} WHERE {$indexname} = {$delimiter}";
        return $this->getResult($query);
    }
    
}
