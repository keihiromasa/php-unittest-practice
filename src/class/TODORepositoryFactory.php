<?php

require_once 'db/TODOAccessor.php';
require_once 'db/TODOAccessorFactory.php';

/**
 * Description of TODORepositoryFactory
 *
 * @author hiromasa.kei
 */
class TODORepositoryFactory {

    public static function create() {
        $factory = new TODOAccessorFactory();
        return new TODORepository($factory->create());
    }

}
