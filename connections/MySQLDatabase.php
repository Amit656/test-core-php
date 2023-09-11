<?php
require_once __DIR__ . '/../vendor/autoload.php'; // If using Composer
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotenv->load();

$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($key, $value) = explode('=', $line, 2);
        $_ENV[$key] = $value;
    }
}

class MySQLDatabase {
    private $host;
    private $username;
    private $password;
    private $database;
    public $connection;

    public function __construct() {
        $this->host = $_ENV['DB_HOST'];
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->database = $_ENV['DB_DATABASE'];
    }

    public function connect() {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function disconnect() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }

    public function query($sql) {
        $result = mysqli_query($this->connection, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($this->connection));
        }

        return $result;
    }

    public function escapeString($string) {
        return mysqli_real_escape_string($this->connection, $string);
    }

    // You can add more methods as needed for specific database operations

    public function getLastInsertedId() {
        return mysqli_insert_id($this->connection);
    }
}

$dbObject = new MySQLDatabase;
$dbObject->connect();
$mysqlConnect = $dbObject;

?>