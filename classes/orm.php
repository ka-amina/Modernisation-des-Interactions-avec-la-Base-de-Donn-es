<?php
require_once __DIR__ . '/../config/connection.php';

class ORM
{
    protected $table;
    protected $connection;

    public function __construct()
    {
        $conn = new Connection();
        $this->connection = $conn->getConnection();
    }

    public function read()
    {
        $query = "SELECT * FROM {$this->table}";

        $result = $this->connection->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete($conditions)
    {
        $conditionFields = [];
        foreach ($conditions as $column => $value) {
            $conditionFields[] = "$column = :$column";
        }
        $query = "DELETE from {$this->table} where " . implode(" AND ", $conditionFields);
        $result = $this->connection->prepare($query);
        $result->execute($conditions);
        return $result->rowCount();

    }

}
?>