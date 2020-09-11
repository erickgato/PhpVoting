<?php 
namespace App\Model\Table;

class PrimaryIndex {
    public $name;
    public $value;
    public function __construct(string $primary = null, int $value) {
        $this->name = $primary;
        $this->value = $value;
    }
}

class Table {
    public $name;
    public $fields;
    public $index;


    public function __construct(string $name = null, array $fields = null, PrimaryIndex $primary = null) {
        $this->name = $name;
        $this->fields = $fields;
        $this->index = $primary;
    }

}
