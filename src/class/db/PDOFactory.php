<?php

class PDOFactory {

    public function __construct() {

    }

    public static function create() {
        //TODO mockかプロダクトオブジェクトを生成する
        $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/mydb.db3');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

}
