<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=$this->host", $this->user, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function create($dbName)
    {
        $query = "CREATE DATABASE IF NOT EXISTS $dbName";
        $this->db->exec($query);
        echo "Database created successfully.";
        // Reconnect to the new database
        $this->db = new PDO("mysql:host=$this->host;dbname=$dbName", $this->user, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function table($tableName, $columns)
    {
        $query = "CREATE TABLE IF NOT EXISTS $tableName ($columns)";
        $this->db->exec($query);
        echo "Table created successfully.";
    }
}

// Usage example
$db = new Database();
$db->create("gestion");
$db->table("classe", "idClasse INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, CLASSE VARCHAR(50), MATIERE VARCHAR(50), COEFF INT(11)"); // Adjust columns as needed 
