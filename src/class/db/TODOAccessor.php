<?php

require_once dirname(__FILE__) . '/../TODO.php';

class TODOAccessor {

    const COLUMN_TODO = 'todo';

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function select(TODO $todo) {
        $statement = $this->pdo->prepare('select todo from todo_list where todo = :todo');
        $statement->bindParam(':todo', $todo->get(), PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        if (count($results) === 0) {
            return null;
        }
        return new TODO($results[0][TODOAccessor::COLUMN_TODO]);
    }

    /**
     *
     * @return type 存在しない場合は空のリスト
     */
    public function selectAll() {
        $statement = $this->pdo->prepare('select todo from todo_list');
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $this->convertToArray($results);
    }

    public function insert(TODO $todo) {
        if ($this->select($todo) !== null) {
            return false;
        }
        $this->pdo->beginTransaction();
        $statement = $this->pdo->prepare('insert into todo_list (todo) values (:todo)');
        $statement->bindParam(':todo', $todo->get(), PDO::PARAM_STR);
        $statement->execute();
        $this->pdo->commit();
        $statement->closeCursor();
        return true;
    }

    public function delete(TODO $todo) {
        $this->pdo->beginTransaction();
        $statement = $this->pdo->prepare('delete from todo_list where todo = :todo');
        $statement->bindParam(':todo', $todo->get(), PDO::PARAM_STR);
        $statement->execute();
        $this->pdo->commit();
        return true;
    }

    private function convertToArray($rowResults) {
        if (empty($rowResults)) {
            return array();
        }
        foreach ($rowResults as $rowResult) {
            $results[] = new TODO($rowResult[TODOAccessor::COLUMN_TODO]);
        }
        return $results;
    }

}
