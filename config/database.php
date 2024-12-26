<?php
use Dotenv\Dotenv;
require '../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
try {
    $connection = new PDO("mysql:host=" . $_ENV['HOST'] . ";dbname=" . $_ENV['DATABASE'], $_ENV['USERNAME'], $_ENV['PASSWORD'], );
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo'connected seccefully';

} catch (PDOException $error) {
    error_log($error->getMessage());
    die("Connection failed: Unable to connect to the database.");

}


?>