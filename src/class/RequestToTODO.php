<?php

require_once dirname(__FILE__) . '/view/TODOViewElems.php';
require_once 'TODO.php';

class RequestToTODO {

    public static function convert($requestParameters) {
        if (!isset($requestParameters[TODOViewElems::TODO])) {
            return null;
        }
        return new TODO($requestParameters[TODOViewElems::TODO]);
    }

}
