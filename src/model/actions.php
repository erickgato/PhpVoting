<?php
namespace App\Model;

abstract class Actions
{
    protected $Mysqlconection;
    protected $_Table; // Must be array associative 
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
    public function INSERT(array $values)
    {
        $RowData = $this->implodeArray($values, ',');
        $query = "INSERT INTO {$this->_Table->name} VALUES ('$RowData') ";
        $result = $this->getResult($query);
        if($result)
            $this->_Table->index->value = $this->Mysqlconection->insert_id;
        return $result;
    }
    public function DELETE(int $id)
    {
        $query = "DELETE FROM {$this->_Table->name} WHERE {$this->_Table->index->name} = $id";
        return $this->getResult($query);
    } 
    public function UPDATE( array $values, int $id ) {
        $table = $this->_Table;
        $update = ""; // intializes a update query syntax
        var_dump(count($table->fields));
        foreach($table->fields as $key => $field ){
            if($key == ( count($table->fields) -1) ) {  
                $update .= " $field = '$values[$key]' "; // ...lastupdate
            }else {
                $update .= " $field = '$values[$key]',"; // update1, update2, ...
            }
        }
        $sql = "UPDATE {$this->_Table->name} SET $update WHERE {$table->index->name} = {$id}";
        return $this->getResult($sql);
    }

    public function SELECT(string $fieldstoselect, array $where = null, bool $nmlines = false ){
        $sql = '';
        $whereClause = '';
        if($whereClause != null )
            $whereClause = "WHERE '{$whereClause[0]}' = '{$whereClause[1]}' ";

        $sql = "SELECT {$fieldstoselect} FROM {$this->_Table->name} {$whereClause}";

        $result = $this->Mysqlconection->query($sql);
        if($nmlines) {
            return $this->SelectNumRows($result);
        }
        else {
            return $this->SelectAssoc($result);
        }
        
    }
    function SelectAssoc($result){
        $assocresult = [];
        $index = 0;
        if($result == false)
            return false;
        while($line = $result->fetch_assoc()){
            $assocresult[$index] = $line;
            $index++;
        }
        return $assocresult;
    }
    function SelectNumRows($resultquery){
        $nmrows = mysqli_num_rows($resultquery);
        return $nmrows;
    }
   
}
