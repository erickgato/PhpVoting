<?php

namespace App\Model\Generics;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description Make a relation into key and value to be must especific
 * 
 */
class PrimaryIndex
{
    public string $name;
    public int $value;


    public function __construct(string $primary = null, int $value)
    {
        $this->name = $primary;
        $this->value = $value;
    }
}
/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @description Modeling a table type to be use for models
 */
class Table
{
    public string $name;
    public array $fields;
    public PrimaryIndex $index;


    public function __construct(string $name = null, array $fields = null, PrimaryIndex $primary = null)
    {
        $this->name = $name;
        $this->fields = $fields;
        $this->index = $primary;
    }
}
