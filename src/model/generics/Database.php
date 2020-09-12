<?php

namespace App\Model\Generics;

use mysqli;

/**
 * @author Erick gato <a.itsbk0703@gmail.com>
 * @package App
 * @description cofigure string escape and conection 
 * 
 */
class Database
{

    private array $config;
    public mysqli $connection;


    public function __construct()
    {
        $this->config = array(
            "database" => $_ENV['DB']['name'],
            "user" => $_ENV['DB']['user'],
            "password" => $_ENV['DB']['password'],
            "instance" => $_ENV['DB']['instance'],
            "port" => $_ENV['DB']['port'],
        );
    }

    /**
     * @description up a mysqli api conection
     * @return mysqli instance
     * 
     */
    public function UP()
    {
        $config = $this->config;
        try {
            $this->connection =  new mysqli(
                $config['instance'],
                $config['user'],
                $config['password'],
                $config['database'],
                $config['port']
            );
            if ($this->connection->connect_error) {
                if ($_ENV['DEBUG'])
                    echo "<pre>error: <br/> {$this->connection->connect_error}  </pre>";
                else
                    echo "internal server error, try again later";
            } else {
                mysqli_set_charset($this->connection, 'utf8');
                return $this->connection;
            }
        } catch (\Throwable $th) {
            echo "internal server error $th";
        }
    }
    /**
     * @description Close mysqli connection
     * @return bool
     */
    public function DOWN()
    {
        if ($this->connection)
            return $this->connection->close();
        else return false;
    }
}
