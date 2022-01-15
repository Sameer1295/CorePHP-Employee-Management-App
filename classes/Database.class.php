<?php 

class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $dbName = "EmployeeManagement_DB";

    protected function connect(){
        $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName;
        $pdo = new pdo($dsn,$this->user,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

?>