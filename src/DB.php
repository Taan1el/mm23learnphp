<?php

namespace App;

use PDO;
use PDOException;

class DB
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("sqlite:db.sqlite");
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function all($table, $class)
    {
        $table = $this->identifier($table);
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function find($table, $class, $id)
    {
        $table = $this->identifier($table);
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE id = :id");
        $stmt->execute(['id' => (int)$id]);

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetch();
    }

    public function where($table, $class, $field, $value)
    {
        $table = $this->identifier($table);
        $field = $this->identifier($field);
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $field = :value");
        $stmt->execute(['value' => $value]);

        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        return $stmt->fetchAll();
    }

    public function insert($table, $fields)
    {
        $table = $this->identifier($table);
        $fieldNames = array_map([$this, 'identifier'], array_keys($fields));
        $fieldNamesText = implode(', ', $fieldNames);
        $placeholders = implode(', ', array_map(fn ($field) => ':' . $field, array_keys($fields)));

        $sql = "INSERT INTO $table ($fieldNamesText) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($fields);
    }

    public function update($table, $fields, $id)
    {
        $table = $this->identifier($table);
        $updateParts = [];
        foreach (array_keys($fields) as $name) {
            $field = $this->identifier($name);
            $updateParts[] = "$field = :$name";
        }
        $updateText = implode(', ', $updateParts);

        $sql = "UPDATE $table SET $updateText WHERE id = :id";
        $fields['id'] = (int)$id;

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($fields);
    }

    public function delete($table, $id)
    {
        $table = $this->identifier($table);
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => (int)$id]);
    }

    private function identifier($name)
    {
        if (!preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name)) {
            throw new \InvalidArgumentException('Invalid database identifier');
        }

        return $name;
    }
}
