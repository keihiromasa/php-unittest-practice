<?php

require_once dirname(__FILE__) . '/PDOFactory.php';

class TODOAccessorFactory {

    public function create() {
        $pdo = PDOFactory::create();
        return new TODOAccessor($pdo);
    }

}
