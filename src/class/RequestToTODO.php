<?php

require_once dirname(__FILE__) . '/view/TODOViewElems.php';
require_once 'TODO.php';

class RequestToTODO {

    public static function convert($requestParameters) {
        if (!isset($requestParameters[TODOViewElems::TODO_REGIST])) {
            return null;
        }
        $requestedValue = $requestParameters[TODOViewElems::TODO_REGIST];
        if ($requestedValue === '') {
            return null;
        }
        return new TODO($requestParameters[TODOViewElems::TODO_REGIST]);
    }

    public static function convertDelete($requestParameters) {
        if (!isset($requestParameters[TODOViewElems::TODO_DELETE])) {
            return null;
        }
        $requestedValue = $requestParameters[TODOViewElems::TODO_DELETE];
        if ($requestedValue === '') {
            return null;
        }
        return new TODO($requestParameters[TODOViewElems::TODO_DELETE]);
    }

}
