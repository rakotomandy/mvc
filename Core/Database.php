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

/* // Usage example
$db = new Database();
$db->create("gestion");
$db->table("users", "id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), email VARCHAR(50), password VARCHAR(255)"); // Adjust columns as needed */
