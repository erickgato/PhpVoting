<?php 
namespace App\Model;

use mysqli;

class Database {

    public $config;
    public $connection;

    public function __construct() {
       $this->config = array(
            "database" => $_ENV['DB']['name'],
            "user" => $_ENV['DB']['user'],
            "password" => $_ENV['DB']['password'],
            "instance" => $_ENV['DB']['instance'],
            "port" => $_ENV['DB']['port'],
        );
    }
    public function UP(){
        $config = $this->config;
        try {
            $this->connection =  new mysqli(
                $config['instance'],
                $config['user'], 
                $config['password'], 
                $config['database'],
                $config['port'] );
            if($this->connection->connect_error) {
                if($_ENV['DEBUG'])
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
    public function DOWN() {
        if($this->connection)
            return $this->connection->close();
        else return false;
    }
    
}