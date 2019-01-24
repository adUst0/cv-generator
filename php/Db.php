<?php
class Db {
    private $connection;

    public function __construct($servername, $dbname, $username, $password) {
        $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    public function query($sql, $args = []) {
        if (!$args) {
            return $this->connection->query($sql);
        }

        $stmt = $this->connection->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public function entryExists($table, $id) {
        $row = $this->query("SELECT * FROM $table WHERE id = $id")->fetch();

        if (!$row) {
            return false;;
        }
        else {
            return true;
        }
    }

    public function getRows($sql, $values = []) {
        $stmt = $this->query($sql, $values);
        return $stmt->fetchAll();
    }

    public function getFirstMatch($sql) {
        $stmt = $this->query($sql);
        return $stmt->fetch();
    }
}
?>