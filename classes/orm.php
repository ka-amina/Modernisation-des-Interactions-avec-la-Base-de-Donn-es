<?php
require_once __DIR__ . '/../config/connection.php';

class ORM
{
    protected $table;
    protected $connection;

    public function __construct() {
        $this->connection = Connection::connect();
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
    public function create($data){
        $columns= implode("," , array_keys($data));
        $values= ":" . implode(", :", array_keys($data));
        print_r($data);
        $query= "INSERT  INTO {$this->table} ($columns) VALUES ($values) ";
        $result= $this->connection-> prepare($query);
        $result->execute($data);
        return;
    }

    public function update($data, $conditions){
      $conditionFields =[];
      foreach($conditions as $column => $value){
        $conditionFields[] = "$column = :$column";
      }
      $updateDataFields= [];
      foreach($data as $column => $value){
        $updateDataFields[] ="$column = :$column";
      }
      $query= "UPDATE {$this->table} SET " .implode(", ",$updateDataFields). " WHERE " .implode(" AND ", $conditionFields);
      $result= $this-> connection->prepare($query);
      $result->execute(array_merge($data, $conditions));
      return;
    }
}
?>