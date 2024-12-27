<?php
use Dotenv\Dotenv;
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Connection
{
    private static $connection = null;
    public static function connect()
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['DATABASE'],
                    $_ENV['USERNAME'],
                    $_ENV['PASSWORD']
                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $error) {
                die("Connection failed: " . $error->getMessage());
            }
        }
        return self::$connection;
    }
}
?>