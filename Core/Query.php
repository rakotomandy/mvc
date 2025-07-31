<?php

class Query
{
    private $query;
    private $type;
    private $db;

    public static $host;
    public static $user;
    public static $password;
    public static $dbName;

    /**
     * Constructor: initializes the PDO connection
     */
    

    /**
     * Static method to configure connection before instantiating
     */
    public static function connect($host, $user, $password, $dbName)
    {
        self::$host = $host;
        self::$user = $user;
        self::$password = $password;
        self::$dbName = $dbName;
    }

    public function __construct()
    {
        $this->db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$user, self::$password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Prepare custom SQL query with operation type
     */
    public function customQuery($query, $type)
    {
        $this->query = $query;
        $this->type = strtolower($type);
        return $this;
    }

    /**
     * Execute the prepared query with bound parameters
     */
    public function execute($values = [])
    {
        try {
            $stmt = $this->db->prepare($this->query);
            $stmt->execute($values);

            if ($this->type === 'select') {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }

            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Query error: " . $e->getMessage());
        }
    }

    /**
     * Debug method to print the query
     */
    public function get()
    {
        echo $this->query;
    }
}
