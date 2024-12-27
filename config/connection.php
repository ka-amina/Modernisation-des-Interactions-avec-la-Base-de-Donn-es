<?php
use Dotenv\Dotenv;
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Connection
{
    private $connection;
    public function __construct()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['DATABASE'],
                $_ENV['USERNAME'],
                $_ENV['PASSWORD']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            error_log($error->getMessage());
            die("Connection failed: Unable to connect to the database.");
        }
    }

    public function getConnection()
    {
        return $this->connection; 
    }
}



?>