<?php

class PDOFactory {

    public function __construct() {

    }

    public static function create() {
        //TODO mockかプロダクトオブジェクトを生成する
        $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/mydb.db3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        PDOFactory::prepareTable($pdo);
        return $pdo;
    }

    private static function prepareTable(PDO $pdo) {
        $pdo->beginTransaction();
        $pdo->exec("create table if not exists todo_list(todo nvarchar(100))");
        $pdo->commit();
    }

}
