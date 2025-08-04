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
        try {
            $this->db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$user, self::$password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
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
            $stmt = $this->db->prepare($this->query);
            $stmt->execute($values);

            if ($this->type === 'select') {
                return $stmt->fetchAll(PDO::FETCH_OBJ);
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
Query::connect('localhost','root','','gestion');
/* $db = new Query();
$q = $db->customQuery("SELECT * FROM users", "select");
$result = $q->execute();
print_r($result);  */
/*
|--------------------------------------------------------------------------
| How public static works in Query + Workflow Example
|--------------------------------------------------------------------------
|
| 1. Static Properties and Methods
|    - Static properties (public static $host, $user, $password, $dbName) belong to the class, not to any instance.
|    - Static method connect() sets these properties for the whole class.
|    - This allows you to configure the database connection globally before creating Query objects.
|
| 2. Workflow of Query Builder
|    - Step 1: Set connection parameters (once, globally)
|        Query::connect('localhost', 'root', '', 'gestion');
|    - Step 2: Create a Query object (uses static properties for PDO connection)
|        $db = new Query();
|    - Step 3: Build a query (chainable)
|        $q = $db->customQuery("SELECT * FROM users WHERE id = ?", "select");
|    - Step 4: Execute the query with parameters
|        $result = $q->execute([1]);
|    - Step 5: Use the result (array of objects for select)
|        print_r($result);
|    - Step 6: Debug the query string
|        $q->get(); // Outputs: SELECT * FROM users WHERE id = ?
|
| 3. Example Usage
|--------------------------------------------------------
| Query::connect('localhost', 'root', '', 'gestion'); // Set connection globally
| $db = new Query(); // Uses the static connection info
| $q = $db->customQuery("INSERT INTO users (name, email) VALUES (?, ?)", "insert");
| $q->execute(['John', 'john@example.com']); // Insert user
|
| $q = $db->customQuery("SELECT * FROM users", "select");
| $result = $q->execute(); // Fetch all users
| print_r($result); // Array of objects
|
| 4. Explanation
|--------------------------------------------------------
| - Static properties are shared by all instances of Query.
| - You only need to call Query::connect() once before creating Query objects.
| - Each Query object uses these static properties to connect to the database.
| - customQuery() sets the SQL and type (select, insert, etc.).
| - execute() runs the query, binds parameters, and returns results.
| - get() prints the last query string for debugging.
|
|--------------------------------------------------------
| This pattern makes it easy to configure your DB connection once and use
| Query objects anywhere in your project for building and executing SQL queries.