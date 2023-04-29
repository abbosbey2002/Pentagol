<?php

class Database{
    public $servername;  
    public $database;
    public $username;
    public $password;
    // set a values for database connections
    public function __construct($servername, $database, $username, $password){
        $this->servername=$servername;
        $this->database=$database;
        $this->username=$username;
        $this->password=$password;

        $this->connect();
    }
    // connect to database
    public function connect(){
        try{
            $connection=new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the pdo error mode to exeption
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch (PDOException $e){
            echo "connection failed: ". $e->getMessage();
        }

    }
}