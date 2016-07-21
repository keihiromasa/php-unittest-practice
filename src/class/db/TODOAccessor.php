<?php

require_once dirname(__FILE__) . '/../TODO.php';

class TODOAccessor {

    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     *
     * @return type 存在しない場合は空のリスト
     */
    public function selectAll() {
        $statement = $this->pdo->prepare('select todo from todo_list');
        $statement->execute();
        $results = $statement->fetchAll();
        return $this->convertToArray($results);
    }

    public function insert(TODO $todo) {
        $this->pdo->beginTransaction();
        $statement = $this->pdo->prepare('insert into todo_list (todo) values (:todo)');
        $statement->bindParam(':todo', $todo->get(), PDO::PARAM_STR);
        $statement->execute();
        $this->pdo->commit();
    }

    private function convertToArray($rowResults) {
        if (empty($rowResults)) {
            return array();
        }
        foreach ($rowResults as $rowResult) {
            $results[] = new TODO($rowResult['todo']);
        }
        return $results;
    }

}
